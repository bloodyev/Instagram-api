<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * TwoByTwoItem.
 *
 * @method Channel getChannel()
 * @method IGTV getIgtv()
 * @method Shopping getShopping()
 * @method bool isChannel()
 * @method bool isIgtv()
 * @method bool isShopping()
 * @method $this setChannel(Channel $value)
 * @method $this setIgtv(IGTV $value)
 * @method $this setShopping(Shopping $value)
 * @method $this unsetChannel()
 * @method $this unsetIgtv()
 * @method $this unsetShopping()
 */
class TwoByTwoItem extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'shopping'  => 'Shopping',
        'igtv'      => 'IGTV',
        'channel'   => 'Channel',
    ];
}
