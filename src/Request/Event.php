<?php

namespace InstagramAPI\Request;

use InstagramAPI\Constants;
use InstagramAPI\Signatures;

/**
 * Functions related to Instagram's logging events.
 */
class Event extends RequestCollection
{
    /**
     * Get event default configuration.
     *
     * @param bool $follow If you are following the user you are liking the media.
     */
    public function getEventConfig(
        $follow = false)
    {
        $config = [];

        $config['account_id'] = $this->ig->account_id;
        $config['phone_id'] = $this->ig->phone_id;
        $config['uuid'] = $this->ig->uuid;
        $config['session_id'] = $this->ig->client->getPigeonSession();
        $config['build_version'] = Constants::VERSION_CODE;
        $config['ig_version'] = Constants::IG_VERSION;
        $config['follow_status'] = $follow ? 'following' : 'not_following';
        $config['user_agent'] = $this->ig->device->getUserAgent();
        $config['capabilities'] = Constants::X_IG_Capabilities;
        $config['proxy'] = $this->ig->getProxy();

        if (!empty($this->ig->settings->get('config'))) {
            $config['config'] = $this->ig->settings->get('config');
        }

        return $config;
    }

    /**
     * Get event default configuration and merge with specific configuration.
     *
     * @param array $config This contains configuration for the event.
     *                      'auth_key' Auth key.
     * @param bool  $follow If you are following the user you are liking the media.
     */
    public function getDefaultConfigAndMerge(
        $config,
        $follow = false)
    {
        $defaultConfig = $this->getEventConfig($follow);

        return array_merge($defaultConfig, $config);
    }

    /**
     * Get standard request parameters.
     *
     * @param array $config This contains configuration for the event.
     *                      'auth_key' Auth key.
     * @param bool  $follow If you are following the user you are liking the media.
     */
    public function getStandardRequest(
        $config = [],
        $follow = false)
    {
        return $this->ig->request('events.php')
          ->setVersion(999)
          ->setIsBodyCompressed(true)
          ->setSignedPost(false)
          ->addPost('config', base64_encode(serialize($this->getDefaultConfigAndMerge($config))))
          ->setNeedsAuth(false)
          ->setAddDefaultHeaders(false);
    }

    /**
     * Updates and set config response on storage settings.
     *
     * @param array $response
     */
    public function updateConfig(
        $response)
    {
        if (!empty($response['config'])) {
            $this->ig->settings->set('config', $response['config']);
        }
    }

    /**
     * Send like event.
     *
     * @param mixed $item   Media Item.
     * @param bool  $follow If you are following the user you are liking the media.
     * @param array $config This contains configuration for the event.
     *                      'auth_key' Auth key.
     */
    public function sendLikeEvent(
        $item,
        $follow,
        $config = [])
    {
        $response = $this->getStandardRequest($config, $follow)
          ->addPost('data', base64_encode(serialize($item->asArray())))
          ->addPost('event', 'like')
          ->getDecodedResponse();

        $this->updateConfig($response);

        return $response;
    }

    /**
     * Send like event to a discover tag media.
     *
     * @param string $hashtagName The hashtag, not including the "#".
     * @param string $hashtagId   The hashtag ID.
     * @param int[]  $position    Position of the media in the feed.
     * @param mixed  $item        Media Item.
     * @param bool   $follow      If you are following the user you are liking the media.
     * @param array  $config      This contains configuration for the event.
     *                            'auth_key' Auth key.
     */
    public function sendDiscoverTagLikeEvent(
        $hashtagName,
        $hashtagId,
        $position,
        $item,
        $follow,
        $config = [])
    {
        $response = $this->getStandardRequest($config, $follow)
          ->addPost('data', base64_encode(serialize($item->asArray())))
          ->addPost('hashtag_id', base64_encode(serialize($hashtagId)))
          ->addPost('hashtag_name', base64_encode(serialize($hashtagName)))
          ->addPost('position', base64_encode(serialize($position)))
          ->addPost('event', 'discover_tag_like')
          ->getDecodedResponse();

        $this->updateConfig($response);

        return $response;
    }

    /**
     * Send follow event.
     *
     * @param mixed $userId User ID.
     * @param array $config This contains configuration for the event.
     *                      'auth_key' Auth key.
     */
    public function sendFollowEvent(
        $userId,
        $config = [])
    {
        $response = $this->getStandardRequest($config)
          ->addPost('data', base64_encode(serialize($userId)))
          ->addPost('event', 'follow')
          ->getDecodedResponse();

        $this->updateConfig($response);

        return $response;
    }

    /**
     * Send unfollow event.
     *
     * @param mixed $userId User ID.
     * @param array $config This contains configuration for the event.
     *                      'auth_key' Auth key.
     */
    public function sendUnfollowEvent(
        $userId,
        $config = [])
    {
        $response = $this->getStandardRequest($config)
          ->addPost('data', base64_encode(serialize($userId)))
          ->addPost('event', 'unfollow')
          ->getDecodedResponse();

        $this->updateConfig($response);

        return $response;
    }

    /**
     * Send video view event.
     *
     * @param mixed $item   Media Item.
     * @param bool  $follow If you are following the user you are viewing the media.
     * @param array $config This contains configuration for the event.
     *                      'auth_key' Auth key.
     */
    public function sendVideoViewEvent(
        $item,
        $follow,
        $config = [])
    {
        $response = $this->getStandardRequest($config, $follow)
          ->addPost('data', base64_encode(serialize($item->asArray())))
          ->addPost('event', 'video_view')
          ->getDecodedResponse();

        $this->updateConfig($response);

        return $response;
    }

    /**
     * Send upload media event.
     *
     * @param \InstagramAPI\Response\ConfigureResponse $configureResponse Configure Response.
     * @param array                                    $config            This contains configuration for the event.
     *                                                                    'media_type' PHOTO or VIDEO
     *                                                                    'file_size'  size in bytes
     *                                                                    'auth_key' Auth key.
     */
    public function sendUploadMediaEvent(
        $configureResponse,
        $config = [])
    {
        $config['waterfall_id'] = Signatures::generateUUID();

        $response = $this->getStandardRequest($config)
          ->addPost('data', base64_encode(serialize($configureResponse->asArray())))
          ->addPost('event', 'upload_media')
          ->getDecodedResponse();

        $this->updateConfig($response);

        return $response;
    }

    /**
     * Send upload album event.
     *
     * @param mixed $albumId           Album ID.
     * @param int   $albumSize         Number of items in the album.
     * @param int   $coverMediaType    Cover media Type. 1 for Photo and 2 for Video.
     * @param array $config            This contains configuration for the event.
     *                                 'auth_key' Auth key.
     * @param mixed $configureResponse
     */
    public function sendUploadAlbumEvent(
        $configureResponse,
        $albumSize,
        $coverMediaType,
        $config = [])
    {
        $config['album_size'] = $albumSize;
        $config['cover_media_type'] = $coverMediaType;

        $response = $this->getStandardRequest($config)
          ->addPost('data', base64_encode(serialize($configureResponse->asArray())))
          ->addPost('event', 'upload_album')
          ->getDecodedResponse();

        $this->updateConfig($response);

        return $response;
    }

    /**
     * Send comment event on explore media.
     *
     * @param string $parentPk  The media ID in Instagram's internal format (ie "3482384834_43294").
     * @param string $commentId The comment's ID.
     * @param mixed  $item      Media Item.
     * @param bool   $follow    If you are following the user you are viewing the media.
     * @param array  $config    This contains configuration for the event.
     *                          'auth_key' Auth key.
     */
    public function sendExploreCommentEvent(
        $parentPk,
        $commentId,
        $item,
        $follow,
        $config = [])
    {
        $response = $this->getStandardRequest($config, $follow)
          ->addPost('data', base64_encode(serialize($item->asArray())))
          ->addPost('comment_id', base64_encode(serialize($commentId)))
          ->addPost('parent_pk', base64_encode(serialize($parentPk)))
          ->addPost('event', 'explore_comment')
          ->getDecodedResponse();

        $this->updateConfig($response);

        return $response;
    }

    /**
     * Send comment event on profile media.
     *
     * @param string $commentId The comment's ID.
     * @param mixed  $item      Media Item.
     * @param bool   $follow    If you are following the user you are viewing the media.
     * @param array  $config    This contains configuration for the event.
     *                          'auth_key' Auth key.
     */
    public function sendCommentEvent(
        $commentId,
        $item,
        $follow,
        $config = [])
    {
        $response = $this->getStandardRequest($config, $follow)
          ->addPost('data', base64_encode(serialize($item->asArray())))
          ->addPost('comment_id', base64_encode(serialize($commentId)))
          ->addPost('event', 'comment')
          ->getDecodedResponse();

        $this->updateConfig($response);

        return $response;
    }

    /**
     * Send comment event on self media.
     *
     * @param string $commentId The comment's ID.
     * @param mixed  $item      Media Item.
     * @param array  $config    This contains configuration for the event.
     *                          'auth_key' Auth key.
     */
    public function sendSelfCommentEvent(
        $commentId,
        $item,
        $config = [])
    {
        $response = $this->getStandardRequest($config)
          ->addPost('data', base64_encode(serialize($item->asArray())))
          ->addPost('comment_id', base64_encode(serialize($commentId)))
          ->addPost('event', 'self_comment')
          ->getDecodedResponse();

        $this->updateConfig($response);

        return $response;
    }

    /**
     * Send story view event.
     *
     * @param mixed $items  Media Item.
     * @param bool  $follow If you are following the user you are viewing the media.
     * @param array $config This contains configuration for the event.
     *                      'auth_key' Auth key.
     */
    public function sendStoryViewEvent(
        $items,
        $follow,
        $config = [])
    {
        if (count($items) > 40) {
            throw new \InvalidArgumentException(sprintf('Only 40 items at max can be sent in each batch.'));
        }

        $itemsArr = [];
        foreach ($items as $item) {
            $itemsArr[] = $item->asArray();
        }

        $response = $this->getStandardRequest($config, $follow)
          ->addPost('data', base64_encode(serialize($itemsArr)))
          ->addPost('event', 'story')
          ->getDecodedResponse();

        $this->updateConfig($response);

        return $response;
    }

    /**
     * Send story view event from follow list module ('reel_follow_list').
     *
     * @param mixed $items  Media Items.
     * @param bool  $follow If you are following the user you are viewing the media.
     * @param array $config This contains configuration for the event.
     *                      'auth_key' Auth key.
     */
    public function sendFollowListStoryViewEvent(
        $items,
        $follow,
        $config = [])
    {
        if (count($items) > 25) {
            throw new \InvalidArgumentException(sprintf('Only 25 items at max can be sent in each batch.'));
        }

        $itemsArr = [];
        foreach ($items as $item) {
            $itemsArr[] = $item->asArray();
        }

        $response = $this->getStandardRequest($config, $follow)
          ->addPost('data', base64_encode(serialize($itemsArr)))
          ->addPost('event', 'follow_list_story_view')
          ->getDecodedResponse();

        $this->updateConfig($response);

        return $response;
    }

    /**
     * Send media impression event.
     *
     * @param string $module Module where the action was done.
     * @param mixed  $items  Media Items.
     * @param bool   $follow If you are following the user you are viewing the media.
     * @param array  $config This contains configuration for the event.
     *                       'auth_key' Auth key.
     */
    public function sendMediaImpressionEvent(
        $module,
        $items,
        $follow,
        $config = [])
    {
        if (count($items) > 25) {
            throw new \InvalidArgumentException(sprintf('Only 25 items at max can be sent in each batch.'));
        }

        switch ($module) {
            case 'profile':
            case 'feed_contextual_profile':
            case 'feed_contextual_chain':
            case 'feed_timeline':
            case 'feed_short_url':
                break;
            default:
                throw new \InvalidArgumentException(sprintf('"%s" is not a valid module for this event.', $module));
        }

        $itemsArr = [];
        foreach ($items as $item) {
            $itemsArr[] = $item->asArray();
        }

        $response = $this->getStandardRequest($config, $follow)
          ->addPost('data', base64_encode(serialize($itemsArr)))
          ->addPost('module', base64_encode(serialize($module)))
          ->addPost('event', 'media_impression')
          ->getDecodedResponse();

        $this->updateConfig($response);

        return $response;
    }

    /**
     * Send time spent event.
     *
     * @param int   $time   Time spent in miliseconds.
     * @param mixed $item   Media Item.
     * @param array $config This contains configuration for the event.
     *                      'auth_key' Auth key.
     */
    public function sendTimeSpentEvent(
        $time,
        $item,
        $config = [])
    {
        $response = $this->getStandardRequest($config)
          ->addPost('data', base64_encode(serialize($item->asArray())))
          ->addPost('time', base64_encode(serialize($time)))
          ->addPost('event', 'time_spent')
          ->getDecodedResponse();

        $this->updateConfig($response);

        return $response;
    }

    /**
     * Send login event.
     *
     * @param array $config This contains configuration for the event.
     *                      'auth_key' Auth key.
     */
    public function sendLoginEvent(
        $config = [])
    {
        $response = $this->getStandardRequest($config)
          ->addPost('event', 'login')
          ->getDecodedResponse();

        $this->updateConfig($response);

        return $response;
    }

    /**
     * Send profile view event.
     *
     * @param mixed $userId User ID.
     * @param array $config This contains configuration for the event.
     *                      'auth_key' Auth key.
     */
    public function sendProfileViewEvent(
        $userId,
        $config = [])
    {
        $response = $this->getStandardRequest($config)
          ->addPost('data', base64_encode(serialize($userId)))
          ->addPost('event', 'profile_view')
          ->getDecodedResponse();

        $this->updateConfig($response);

        return $response;
    }

    /**
     * Send explore feed navigation event.
     *
     * @param string $module Source module. The module you are coming from.
     * @param array  $config This contains configuration for the event.
     *                       'auth_key' Auth key.
     */
    public function sendExploreFeedNavigationEvent(
        $module = 'feed_timeline',
        $config = [])
    {
        $response = $this->getStandardRequest($config)
          ->addPost('event', 'explore_feed_navigation')
          ->addPost('module', base64_encode(serialize($module)))
          ->getDecodedResponse();

        $this->updateConfig($response);

        return $response;
    }

    /**
     * Send liked feed navigation event.
     *
     * @param array $config This contains configuration for the event.
     *                      'auth_key' Auth key.
     */
    public function sendLikedFeedNavigationEvent(
        $config = [])
    {
        $response = $this->getStandardRequest($config)
          ->addPost('event', 'liked_feed_navigation')
          ->getDecodedResponse();

        $this->updateConfig($response);

        return $response;
    }

    /**
     * Send Direct Message event.
     *
     * @param string $clientContext
     * @param array  $config        This contains configuration for the event.
     *                              'auth_key' Auth key.
     */
    public function sendDirectMessageEvent(
        $clientContext,
        $config = [])
    {
        $response = $this->getStandardRequest($config)
          ->addPost('client_context', $clientContext)
          ->addPost('event', 'send_dm')
          ->getDecodedResponse();

        $this->updateConfig($response);

        return $response;
    }
}
