<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * TVGuideResponse.
 *
 * @method Model\Badging getBadging()
 * @method string getBannerToken()
 * @method mixed getBrowseItems()
 * @method Model\TVChannel[] getChannels()
 * @method Model\Composer getComposer()
 * @method mixed getMaxId()
 * @method mixed getMessage()
 * @method bool getMoreAvailable()
 * @method Model\TVChannel getMyChannel()
 * @method mixed getSeenState()
 * @method string getStatus()
 * @method Model\_Message[] get_Messages()
 * @method bool isBadging()
 * @method bool isBannerToken()
 * @method bool isBrowseItems()
 * @method bool isChannels()
 * @method bool isComposer()
 * @method bool isMaxId()
 * @method bool isMessage()
 * @method bool isMoreAvailable()
 * @method bool isMyChannel()
 * @method bool isSeenState()
 * @method bool isStatus()
 * @method bool is_Messages()
 * @method $this setBadging(Model\Badging $value)
 * @method $this setBannerToken(string $value)
 * @method $this setBrowseItems(mixed $value)
 * @method $this setChannels(Model\TVChannel[] $value)
 * @method $this setComposer(Model\Composer $value)
 * @method $this setMaxId(mixed $value)
 * @method $this setMessage(mixed $value)
 * @method $this setMoreAvailable(bool $value)
 * @method $this setMyChannel(Model\TVChannel $value)
 * @method $this setSeenState(mixed $value)
 * @method $this setStatus(string $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetBadging()
 * @method $this unsetBannerToken()
 * @method $this unsetBrowseItems()
 * @method $this unsetChannels()
 * @method $this unsetComposer()
 * @method $this unsetMaxId()
 * @method $this unsetMessage()
 * @method $this unsetMoreAvailable()
 * @method $this unsetMyChannel()
 * @method $this unsetSeenState()
 * @method $this unsetStatus()
 * @method $this unset_Messages()
 */
class TVGuideResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'channels'          => 'Model\TVChannel[]',
        'my_channel'        => 'Model\TVChannel',
        'badging'           => 'Model\Badging',
        'composer'          => 'Model\Composer',
        'banner_token'      => 'string',
        'browse_items'      => '',
        'max_id'            => '',
        'more_available'    => 'bool',
        'seen_state'        => '',
    ];
}
