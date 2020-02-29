<?php

namespace InstagramAPI\Request;

use InstagramAPI\Exception\RequestHeadersTooLargeException;
use InstagramAPI\Response;

/**
 * General content discovery functions which don't fit into any better groups.
 */
class Discover extends RequestCollection
{
    /**
     * Get Explore tab feed.
     *
     * @param string|null $clusterId  The cluster ID. Default page: 'explore_all:0', Animals: 'hashtag_inspired:1',
     *                                Style: 'hashtag_inspired:26', Comics: 'hashtag_inspired:20', Travel: 'hashtag_inspired:28',
     *                                Architecture: 'hashtag_inspired:18', Beauty: 'hashtag_inspired:3', DIY: 'hashtag_inspired:21',
     *                                Auto: 'hashtag_inspired:19', Music: 'hashtag_inspired:11', Nature: 'hashtag_inspired:24',
     *                                Decor: 'hashtag_inspired:5', Dance: 'hashtag_inspired:22'.
     * @param string|null $maxId      Next "maximum ID", used for pagination.
     * @param bool        $isPrefetch Whether this is the first fetch; we'll ignore maxId if TRUE.
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\ExploreResponse
     */
    public function getExploreFeed(
        $clusterId = 'explore_all:0',
        $maxId = null,
        $isPrefetch = false)
    {
        $request = $this->ig->request('discover/topical_explore/')
            ->addParam('is_prefetch', $isPrefetch)
            ->addParam('omit_cover_media', true)
            ->addParam('use_sectional_payload', true)
            ->addParam('timezone_offset', date('Z'))
            ->addParam('session_id', $this->ig->session_id)
            ->addParam('include_fixed_destinations', true)
            ->addParam('cluster_id', $clusterId);

        if (!$isPrefetch) {
            if ($maxId === null) {
                $maxId = 0;
            }
            $request->addParam('max_id', $maxId);
            $request->addParam('module', 'explore_popular');
        }

        return $request->getResponse(new Response\ExploreResponse());
    }

    /**
     * Get discover chaining feed.
     *
     * @param \Response\Model\Item $mediaItem       The Media Item from `getExploreFeed()`.
     * @param string               $chainingSession The chaining feed UUID. You must use the same value for all pages of the feed.
     * @param string|null          $clusterId       The cluster ID. Default page: 'explore_all:0', Animals: 'hashtag_inspired:1',
     *                                              Style: 'hashtag_inspired:26', Comics: 'hashtag_inspired:20', Travel: 'hashtag_inspired:28',
     *                                              Architecture: 'hashtag_inspired:18', Beauty: 'hashtag_inspired:3', DIY: 'hashtag_inspired:21',
     *                                              Auto: 'hashtag_inspired:19', Music: 'hashtag_inspired:11', Nature: 'hashtag_inspired:24',
     *                                              Decor: 'hashtag_inspired:5', Dance: 'hashtag_inspired:22'.
     * @param string|null          $maxId           Next "maximum ID", used for pagination.
     * @param int                  $index           Paging token index.
     * @param string               $surface         Surface.
     * @param array|null           $options         An associative array with following keys (all
     *                                              of them are optional):
     *                                              "is_charging" Wether the device is being charged
     *                                              or not. Valid values: 0 for not charging, 1 for
     *                                              charging.
     *                                              "battery_level" Sets the current device battery
     *                                              level.
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\DiscoverChainingFeedResponse
     *
     * @see Signatures::generateUUID() To create the chaining session.
     */
    public function getChainingFeed(
        $mediaItem,
        $chainingSession,
        $clusterId = 'explore_all:0',
        $maxId = null,
        $index = 0,
        $surface = 'explore_media_grid',
        array $options = null)
    {
        $pagingToken = [
            'last_organic_item' => [
                'id'    => $mediaItem->getId(),
                'index' => $index, // TODO: Needs research.
            ],
        ];

        $request = $this->ig->request('discover/chaining_experience_feed/')
            ->setSignedPost(false)
            ->addPost('_uuid', $this->ig->uuid)
            ->addPost('_csrftoken', $this->ig->client->getToken())
            ->addPost('surface', $surface)
            ->addPost('explore_source_token', $mediaItem->getExploreSourceToken())
            ->addPost('trigger', 'tap')
            ->addPost('media_id', $mediaItem->getId())
            ->addPost('entry_point', 'topical_explore')
            ->addPost('chaining_session_id', $chainingSession)
            ->addPost('cluster_id', $clusterId)
            ->addPost('will_sound_on', '0')
            ->addPost('author_id', $mediaItem->getUser()->getPk())
            ->addPost('media_type', $mediaItem->getMediaType())
            ->addPost('paging_token', $pagingToken);

        if (isset($options['is_charging'])) {
            $request->addPost('is_charging', $options['is_charging']);
        } else {
            $request->addPost('is_charging', '0');
        }

        if (isset($options['battery_level'])) {
            $request->addPost('battery_level', $options['battery_level']);
        } else {
            $request->addPost('battery_level', mt_rand(25, 100));
        }

        if ($maxId !== null) {
            $request->addPost('max_id', $maxId);
        }

        return $request->getResponse(new Response\DiscoverChainingFeedResponse());
    }

    /**
     * Report media in the Explore-feed.
     *
     * @param string $exploreSourceToken Token related to the Explore media.
     * @param string $userId             Numerical UserPK ID.
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\ReportExploreMediaResponse
     */
    public function reportExploreMedia(
        $exploreSourceToken,
        $userId)
    {
        return $this->ig->request('discover/explore_report/')
            ->addParam('explore_source_token', $exploreSourceToken)
            ->addParam('m_pk', $this->ig->account_id)
            ->addParam('a_pk', $userId)
            ->getResponse(new Response\ReportExploreMediaResponse());
    }

    /**
     * Search for Instagram users, hashtags and places via Facebook's algorithm.
     *
     * This performs a combined search for "top results" in all 3 areas at once.
     *
     * @param string      $query       The username/full name, hashtag or location to search for.
     * @param string      $latitude    (optional) Latitude.
     * @param string      $longitude   (optional) Longitude.
     * @param array       $excludeList Array of grouped numerical entity IDs (ie "users" => ["4021088339"])
     *                                 to exclude from the response, allowing you to skip entities
     *                                 from a previous call to get more results. The following entities are supported:
     *                                 "users", "places", "tags".
     * @param string|null $rankToken   (When paginating) The rank token from the previous page's response.
     *
     * @throws \InvalidArgumentException
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\FBSearchResponse
     *
     * @see FBSearchResponse::getRankToken() To get a rank token from the response.
     * @see examples/paginateWithExclusion.php For a rank token example (but with a different type of exclude list).
     */
    public function search(
        $query,
        $latitude = null,
        $longitude = null,
        array $excludeList = [],
        $rankToken = null)
    {
        // Do basic query validation.
        if (!is_string($query) || $query === '') {
            throw new \InvalidArgumentException('Query must be a non-empty string.');
        }
        $request = $this->_paginateWithMultiExclusion(
            $this->ig->request('fbsearch/topsearch_flat/')
                ->addParam('context', 'blended')
                ->addParam('query', $query)
                ->addParam('timezone_offset', date('Z')),
            $excludeList,
            $rankToken
        );

        if ($latitude !== null && $longitude !== null) {
            $request
                ->addParam('lat', $latitude)
                ->addParam('lng', $longitude);
        }

        try {
            /** @var Response\FBSearchResponse $result */
            $result = $request->getResponse(new Response\FBSearchResponse());
        } catch (RequestHeadersTooLargeException $e) {
            $result = new Response\FBSearchResponse([
                'has_more'   => false,
                'hashtags'   => [],
                'users'      => [],
                'places'     => [],
                'rank_token' => $rankToken,
            ]);
        }

        return $result;
    }

    /**
     * Register recent search click.
     *
     * @param string $entityType One of: "hashtag", "place" or "user".
     * @param string $entityId   Entity ID. Example: '1578458962261026'.
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\GenericResponse
     */
    public function registerRecentSearchClick(
        $entityType,
        $entityId)
    {
        if (!in_array($entityType, ['user', 'hashtag', 'place'], true)) {
            throw new \InvalidArgumentException(sprintf('Unknown entity type: %s.', $entityType));
        }

        return $this->ig->request('fbsearch/register_recent_search_click/')
            ->setSignedPost(false)
            ->addPost('entity_type', $entityType)
            ->addPost('entity_id', $entityId)
            ->addPost('_csrftoken', $this->ig->client->getToken())
            ->addPost('_uuid', $this->ig->uuid)
            ->getResponse(new Response\GenericResponse());
    }

    /**
     * Get search suggestions via Facebook's algorithm.
     *
     * NOTE: In the app, they're listed as the "Suggested" in the "Top" tab at the "Search" screen.
     *
     * @param string $type One of: "blended", "users", "hashtags" or "places".
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\SuggestedSearchesResponse
     */
    public function getSuggestedSearches(
        $type)
    {
        if (!in_array($type, ['blended', 'users', 'hashtags', 'places'], true)) {
            throw new \InvalidArgumentException(sprintf('Unknown search type: %s.', $type));
        }

        return $this->ig->request('fbsearch/suggested_searches/')
            ->addParam('type', $type)
            ->getResponse(new Response\SuggestedSearchesResponse());
    }

    /**
     * Get recent searches via Facebook's algorithm.
     *
     * NOTE: In the app, they're listed as the "Recent" in the "Top" tab at the "Search" screen.
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\RecentSearchesResponse
     */
    public function getRecentSearches()
    {
        return $this->ig->request('fbsearch/recent_searches/')
            ->getResponse(new Response\RecentSearchesResponse());
    }

    /**
     * Clear the search history.
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\GenericResponse
     */
    public function clearSearchHistory()
    {
        return $this->ig->request('fbsearch/clear_search_history/')
            ->setSignedPost(false)
            ->addPost('_uuid', $this->ig->uuid)
            ->addPost('_csrftoken', $this->ig->client->getToken())
            ->getResponse(new Response\GenericResponse());
    }

    /**
     * Get nullstate dynamic sections.
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\NullstateDynamicSectionsResponse
     */
    public function getNullStateDynamicSections()
    {
        return $this->ig->request('fbsearch/nullstate_dynamic_sections/')
            ->setSignedPost(false)
            ->addParam('type', 'blended')
            ->getResponse(new Response\NullstateDynamicSectionsResponse());
    }
}
