<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * AnimatedMediaImage.
 *
 * @method AnimatedMediaImageFixedHeight getFixedHeight()
 * @method bool isFixedHeight()
 * @method $this setFixedHeight(AnimatedMediaImageFixedHeight $value)
 * @method $this unsetFixedHeight()
 */
class AnimatedMediaImage extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'fixed_height'  => 'AnimatedMediaImageFixedHeight',
    ];
}
