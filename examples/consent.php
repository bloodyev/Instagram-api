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
    if ($e instanceof InstagramAPI\Exception\ConsentRequiredException) {
        $response = $ig->internal->sendConsent();
        while (1) {
            switch ($response->getScreenKey()) {
                case 'qp_intro': // Intro
                    $response = $ig->internal->sendConsent($response->getScreenKey());
                    break;
                case 'dob': // Date of Birth
                    $response = $ig->internal->sendConsent($response->getScreenKey(), $day, $month, $year); // Example: 1, 1, 1925
                     break;
                case 'tos': // Terms of Service
                    $response = $ig->internal->sendConsent($response->getScreenKey());
                     break;
                case 'finished': // finished
                case 'already_finished':
                default:
                    break 2;
            }
        }
    }
}

try {
    // Your code
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
}
