<?php

set_time_limit(0);
date_default_timezone_set('UTC');

require __DIR__.'/../vendor/autoload.php';

/////// CONFIG ///////
$username = '';
$password = '';
$debug = true;
$truncatedDebug = false;
//////////////////////

$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);

try {
    $loginResponse = $ig->login($username, $password);

    if ($loginResponse !== null && $loginResponse->isTwoFactorRequired()) {
        $twoFactorIdentifier = $loginResponse->getTwoFactorInfo()->getTwoFactorIdentifier();

        // The "STDIN" lets you paste the code via terminal for testing.
        // You should replace this line with the logic you want.
        // The verification code will be sent by Instagram via SMS.
        $verificationCode = trim(fgets(STDIN));
        $ig->finishTwoFactorLogin($username, $password, $twoFactorIdentifier, $verificationCode);
    }
} catch (Exception $e) {
    if ($e instanceof InstagramAPI\Exception\Checkpoint\ChallengeRequiredException) {
        $iterations = 0;
        $challenge = $e->getResponse()->getChallenge();
        if (!is_array($challenge)) {
            $checkApiPath = substr($challenge->getApiPath(), 1);
        } else {
            $checkApiPath = substr($challenge['api_path'], 1);
        }
        while (true) {
            try {
                if (++$iterations >= InstagramAPI\Request\Checkpoint::MAX_CHALLENGE_ITERATIONS) {
                    throw new InstagramAPI\Exception\Checkpoint\ChallengeIterationsLimitException();
                }
                switch (true) {
                    case $e instanceof InstagramAPI\Exception\Checkpoint\ChallengeRequiredException:
                        // Send a challenge request
                        $ig->checkpoint->sendChallenge($checkApiPath);
                        break;
                    case $e instanceof InstagramAPI\Exception\Checkpoint\EscalationInformationalException:
                        $ig->checkpoint->sendAcceptEscalationInformational($checkApiPath);
                        break;
                    case $e instanceof InstagramAPI\Exception\Checkpoint\SelectVerifyMethodException:
                        // If condition can be replaced by other logic. This will take always the phone number
                        // if it set, otherwise the email.
                        if ($e->getResponse()->getStepData()->getPhoneNumber() !== null) {
                            $method = 0;
                        } else {
                            $method = 1;
                        }
                        // requestVerificationCode() will request a verification code to your EMAIL or
                        // PHONE NUMBER. If you choose method 0, the code will be sent to your PHONE NUMBER.
                        // IF you choose method 1, the code will be sent to your EMAIL.
                        $ig->checkpoint->requestVerificationCode($checkApiPath, $method);
                        break;
                    case $e instanceof InstagramAPI\Exception\Checkpoint\VerifyCodeException:
                        // The "STDIN" lets you paste the code via terminal for testing.
                        // You should replace this line with the logic you want.
                        // The verification code will be sent by Instagram via SMS.
                        $code = trim(fgets(STDIN));
                        // `sendVerificationCode()` will send the received verification code from the previous step.
                        // If the checkpoint was bypassed, you will be able to do any other request normally.
                        $challenge = $ig->checkpoint->sendVerificationCode($checkApiPath, $code);
                        // If code was successfully verified, update login state and send login flow.
                        $ig->finishCheckpoint($challenge);
                        // Break switch and while loop.
                        break 2;
                    case $e instanceof InstagramAPI\Exception\Checkpoint\SubmitPhoneException:
                        $phone = trim(fgets(STDIN));
                        // Set the phone number for verification.
                        $ig->checkpoint->sendVerificationPhone($checkApiPath, $phone);
                        break;
                    case $e instanceof InstagramAPI\Exception\Checkpoint\SubmitEmailException:
                        $email = trim(fgets(STDIN));
                        // Set the email for verification.
                        $ig->checkpoint->sendVerificationEmail($checkApiPath, $email);
                        break;
                    default:
                        throw new InstagramAPI\Exception\Checkpoint\UnknownChallengeStepException();
                }
            } catch (InstagramAPI\Exception\Checkpoint\ChallengeIterationsLimitException $ex) {
                echo 'Iteration limit reached! Exiting...';
                exit();
            } catch (Exception $ex) {
                $e = $ex;
            }
        }
    }
}

try {
    // Your code
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
}
