<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * TVChannel.
 *
 * @method mixed getApproxTotalVideos()
 * @method mixed getCoverPhotoUrl()
 * @method mixed getDescription()
 * @method string getId()
 * @method Item[] getItems()
 * @method string getMaxId()
 * @method bool getMoreAvailable()
 * @method mixed getSeenState()
 * @method string getTitle()
 * @method string getType()
 * @method User getUserDict()
 * @method bool isApproxTotalVideos()
 * @method bool isCoverPhotoUrl()
 * @method bool isDescription()
 * @method bool isId()
 * @method bool isItems()
 * @method bool isMaxId()
 * @method bool isMoreAvailable()
 * @method bool isSeenState()
 * @method bool isTitle()
 * @method bool isType()
 * @method bool isUserDict()
 * @method $this setApproxTotalVideos(mixed $value)
 * @method $this setCoverPhotoUrl(mixed $value)
 * @method $this setDescription(mixed $value)
 * @method $this setId(string $value)
 * @method $this setItems(Item[] $value)
 * @method $this setMaxId(string $value)
 * @method $this setMoreAvailable(bool $value)
 * @method $this setSeenState(mixed $value)
 * @method $this setTitle(string $value)
 * @method $this setType(string $value)
 * @method $this setUserDict(User $value)
 * @method $this unsetApproxTotalVideos()
 * @method $this unsetCoverPhotoUrl()
 * @method $this unsetDescription()
 * @method $this unsetId()
 * @method $this unsetItems()
 * @method $this unsetMaxId()
 * @method $this unsetMoreAvailable()
 * @method $this unsetSeenState()
 * @method $this unsetTitle()
 * @method $this unsetType()
 * @method $this unsetUserDict()
 */
class TVChannel extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'type'                  => 'string',
        'title'                 => 'string',
        'id'                    => 'string',
        'items'                 => 'Item[]',
        'more_available'        => 'bool',
        'max_id'                => 'string',
        'seen_state'            => '',
        'user_dict'             => 'User',
        'approx_total_videos'   => '',
        'cover_photo_url'       => '',
        'description'           => '',
    ];
}
