<?php

namespace InstagramAPI\Request;

use InstagramAPI\Response;

/**
 * Functions related to Instagram Web.
 */
class Web extends RequestCollection
{
    /**
     * Web login.
     *
     * @param string $username
     * @param string $password
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return string
     */
    public function login(
        $username,
        $password)
    {
        $query = [
            'next'        => '/accounts/access_tool/',
            'oneTapUsers' => [$this->ig->account_id],
        ];

        return $this->ig->request('https://www.instagram.com/accounts/login/ajax/')
            ->setNeedsAuth(false)
            ->setSignedPost(false)
            ->setAddDefaultHeaders(false)
            ->addHeader('X-CSRFToken', $this->ig->client->getToken())
            ->addHeader('X-Requested-With', 'XMLHttpRequest')
            ->addHeader('Referer', 'https://www.instagram.com/accounts/login/')
            ->addPost('username', $username)
            ->addPost('password', $password)
            ->addPost('query_params', json_encode($query))
            ->getRawResponse();
    }

    /**
     * Gets account information.
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\AccountAccessToolResponse
     */
    public function getAccountData()
    {
        $response = $this->ig->request('https://instagram.com/accounts/access_tool/')
            ->setAddDefaultHeaders(false)
            ->addHeader('User-Agent', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:69.0) Gecko/20100101 Firefox/69.0')
            ->getRawResponse();

        preg_match_all('/window._sharedData = (.*);<\/script>/m', $response, $matches, PREG_SET_ORDER, 0);

        return new Response\AccountAccessToolResponse(json_decode($matches[0][1], true));
    }

    /**
     * Like a media using Web Session.
     *
     * @param string $mediaId
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\GenericResponse
     */
    public function like(
        $mediaId)
    {
        return $this->ig->request("https://instagram.com/web/likes/{$mediaId}/like/")
            ->setAddDefaultHeaders(false)
            ->setSignedPost(false)
            ->addHeader('X-CSRFToken', $this->ig->client->getToken())
            ->addHeader('Referer', 'https://www.instagram.com/')
            ->addHeader('X-Requested-With', 'XMLHttpRequest')
            ->addHeader('X-Instagram-AJAX', 'a878ae26c721')
            ->addHeader('X-IG-App-ID', '936619743392459')
            ->addHeader('User-Agent', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:69.0) Gecko/20100101 Firefox/69.0')
            ->addPost('', '')
            ->getResponse(new Response\GenericResponse());
    }

    /**
     * Follow a user using Web Session.
     *
     * @param string $userId
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\WebFollowResponse
     */
    public function follow(
        $userId)
    {
        return $this->ig->request("https://instagram.com/web/friendships/{$userId}/follow/")
            ->setAddDefaultHeaders(false)
            ->setSignedPost(false)
            ->addHeader('X-CSRFToken', $this->ig->client->getToken())
            ->addHeader('Referer', 'https://www.instagram.com/')
            ->addHeader('X-Requested-With', 'XMLHttpRequest')
            ->addHeader('X-Instagram-AJAX', 'a878ae26c721')
            ->addHeader('X-IG-App-ID', '936619743392459')
            ->addHeader('User-Agent', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:69.0) Gecko/20100101 Firefox/69.0')
            ->addPost('', '')
            ->getResponse(new Response\WebFollowResponse());
    }

    /**
     * Unfollow a user using Web Session.
     *
     * @param string $userId
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\WebFollowResponse
     */
    public function unfollow(
        $userId)
    {
        return $this->ig->request("https://instagram.com/web/friendships/{$userId}/unfollow/")
            ->setAddDefaultHeaders(false)
            ->setSignedPost(false)
            ->addHeader('X-CSRFToken', $this->ig->client->getToken())
            ->addHeader('Referer', 'https://www.instagram.com/')
            ->addHeader('X-Requested-With', 'XMLHttpRequest')
            ->addHeader('X-Instagram-AJAX', 'a878ae26c721')
            ->addHeader('X-IG-App-ID', '936619743392459')
            ->addHeader('User-Agent', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:69.0) Gecko/20100101 Firefox/69.0')
            ->addPost('', '')
            ->getResponse(new Response\WebFollowResponse());
    }

    /**
     * Report media using web session.
     *
     * @param string $mediaId
     * @param string $reason  The reason of the report. '1' is Spam, '4' is pornography.
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\GenericResponse
     */
    public function reportMedia(
        $mediaId,
        $reason)
    {
        return $this->ig->request("https://instagram.com/media/{$mediaId}/flag/")
            ->setAddDefaultHeaders(false)
            ->setSignedPost(false)
            ->addHeader('X-CSRFToken', $this->ig->client->getToken())
            ->addHeader('Referer', 'https://www.instagram.com/')
            ->addHeader('X-Requested-With', 'XMLHttpRequest')
            ->addHeader('X-Instagram-AJAX', 'a878ae26c721')
            ->addHeader('X-IG-App-ID', '936619743392459')
            ->addHeader('User-Agent', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:69.0) Gecko/20100101 Firefox/69.0')
            ->addPost('reason', $reason)
            ->getResponse(new Response\GenericResponse());
    }

    /**
     * Get username profile info.
     *
     * @param string $username
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\WebUserInfoResponse
     */
    public function getUserInfo(
        $username)
    {
        return $this->ig->request("https://www.instagram.com/{$username}/")
            ->setAddDefaultHeaders(false)
            ->setSignedPost(false)
            ->setIsSilentFail(true)
            ->addHeader('X-CSRFToken', $this->ig->client->getToken())
            ->addHeader('Referer', 'https://www.instagram.com/')
            ->addHeader('X-Requested-With', 'XMLHttpRequest')
            ->addHeader('X-Instagram-AJAX', 'a878ae26c721')
            ->addHeader('X-IG-App-ID', '936619743392459')
            ->addHeader('User-Agent', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:69.0) Gecko/20100101 Firefox/69.0')
            ->addParam('__a', '1')
            ->getResponse(new Response\WebUserInfoResponse());
    }
}
