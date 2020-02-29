<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * ActionEnabledBySurface.
 *
 * @method bool getStories()
 * @method bool isStories()
 * @method $this setStories(bool $value)
 * @method $this unsetStories()
 */
class ActionEnabledBySurface extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'stories'                 => 'bool',
    ];
}
