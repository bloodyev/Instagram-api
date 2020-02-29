<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * ReactionInfo.
 *
 * @method string getEmoji()
 * @method mixed getIntensity()
 * @method bool isEmoji()
 * @method bool isIntensity()
 * @method $this setEmoji(string $value)
 * @method $this setIntensity(mixed $value)
 * @method $this unsetEmoji()
 * @method $this unsetIntensity()
 */
class ReactionInfo extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'emoji'      => 'string',
        'intensity'  => '',
    ];
}
