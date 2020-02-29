<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * OneByTwoItem.
 *
 * @method Story getStories()
 * @method bool isStories()
 * @method $this setStories(Story $value)
 * @method $this unsetStories()
 */
class OneByTwoItem extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'stories'                                     => 'Story',
    ];
}
