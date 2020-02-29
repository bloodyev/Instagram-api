<?php

namespace InstagramAPI\Request;

use InstagramAPI\Response;

/**
 * Functions for managing Checkpoint.
 */
class Checkpoint extends RequestCollection
{
    const MAX_CHALLENGE_ITERATIONS = 10;

    /**
     * Send checkpoint challenge.
     *
     * @param string $checkpointUrl Checkpoint URL.
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\CheckpointResponse
     */
    public function sendChallenge(
        $checkpointUrl)
    {
        return $this->ig->request($checkpointUrl)
            ->setNeedsAuth(false)
            ->setSignedPost(false)
            ->addParam('guid', $this->ig->uuid)
            ->addParam('device_id', $this->ig->device_id)
            ->getResponse(new Response\CheckpointResponse());
    }

    /**
     * Request verficiation method.
     *
     * @param string $checkpointUrl      Checkpoint URL.
     * @param string $verificationMethod Verification method. '1' for EMAIL, '0' for SMS.
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\CheckpointResponse
     */
    public function requestVerificationCode(
        $checkpointUrl,
        $verificationMethod)
    {
        return $this->ig->request($checkpointUrl)
           ->setNeedsAuth(false)
           ->addPost('choice', $verificationMethod)
           ->addPost('guid', $this->ig->uuid)
           ->addPost('device_id', $this->ig->device_id)
           ->addPost('_csrftoken', $this->ig->client->getToken())
           ->getResponse(new Response\CheckpointResponse());
    }

    /**
     * Send verficiation method.
     *
     * @param string $checkpointUrl    Checkpoint URL.
     * @param string $verificationCode Verification code.
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\LoginResponse
     */
    public function sendVerificationCode(
        $checkpointUrl,
        $verificationCode)
    {
        return $this->ig->request($checkpointUrl)
            ->setNeedsAuth(false)
            ->addPost('security_code', $verificationCode)
            ->addPost('guid', $this->ig->uuid)
            ->addPost('device_id', $this->ig->device_id)
            ->addPost('_csrftoken', $this->ig->client->getToken())
            ->getResponse(new Response\LoginResponse());
    }

    /**
     * Set phone number for checkpoint verification.
     *
     * This could be required and enforced by Instagram.
     *
     * @param string $checkpointUrl Checkpoint URL.
     * @param string $phoneNumber   Phone number with country code. Example: 34123456789.
     * @param bool   $afterLogin    Flag to select wether this is going to be sent after login.
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\CheckpointResponse
     */
    public function sendVerificationPhone(
        $checkpointUrl,
        $phoneNumber,
        $afterLogin = false)
    {
        $request = $this->ig->request($checkpointUrl)
            ->addPost('phone_number', $phoneNumber)
            ->addPost('guid', $this->ig->uuid)
            ->addPost('device_id', $this->ig->device_id)
            ->addPost('_csrftoken', $this->ig->client->getToken());
        if ($afterLogin === false) {
            $request->setNeedsAuth(false);
        } else {
            $request->addPost('_uid', $this->ig->account_id)
                    ->addPost('_uuid', $this->ig->uuid);
        }

        return $request->getResponse(new Response\CheckpointResponse());
    }

    /**
     * Set email for checkpoint verification.
     *
     * This could be required and enforced by Instagram.
     *
     * @param string $checkpointUrl Checkpoint URL.
     * @param string $email         Email.
     * @param bool   $afterLogin    Flag to select wether this is going to be sent after login.
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\CheckpointResponse
     */
    public function sendVerificationEmail(
        $checkpointUrl,
        $email,
        $afterLogin = false)
    {
        $request = $this->ig->request($checkpointUrl)
            ->addPost('email', $email)
            ->addPost('guid', $this->ig->uuid)
            ->addPost('device_id', $this->ig->device_id)
            ->addPost('_csrftoken', $this->ig->client->getToken());
        if ($afterLogin === false) {
            $request->setNeedsAuth(false);
        } else {
            $request->addPost('_uid', $this->ig->account_id)
                    ->addPost('_uuid', $this->ig->uuid);
        }

        return $request->getResponse(new Response\CheckpointResponse());
    }

    /**
     * Accept an escalation informational.
     *
     * This happens when one of the account's media has violated
     * Instagram's ToS or is using a copyrighted media.
     *
     * @param string $checkpointUrl Checkpoint URL.
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\CheckpointResponse
     */
    public function sendAcceptEscalationInformational(
        $checkpointUrl)
    {
        $request = $this->ig->request($checkpointUrl)
            ->addPost('choice', 0)
            ->addPost('next', '/')
            ->addPost('guid', $this->ig->uuid)
            ->addPost('device_id', $this->ig->device_id)
            ->addPost('_csrftoken', $this->ig->client->getToken())
            ->addPost('_uid', $this->ig->account_id)
            ->addPost('_uuid', $this->ig->uuid);

        return $request->getResponse(new Response\CheckpointResponse());
    }
}
