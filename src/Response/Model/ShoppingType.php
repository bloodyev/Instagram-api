<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * ShoppingType.
 *
 * @method string getId()
 * @method bool getShouldUseContextualFeed()
 * @method string getTitle()
 * @method string getType()
 * @method bool isId()
 * @method bool isShouldUseContextualFeed()
 * @method bool isTitle()
 * @method bool isType()
 * @method $this setId(string $value)
 * @method $this setShouldUseContextualFeed(bool $value)
 * @method $this setTitle(string $value)
 * @method $this setType(string $value)
 * @method $this unsetId()
 * @method $this unsetShouldUseContextualFeed()
 * @method $this unsetTitle()
 * @method $this unsetType()
 */
class ShoppingType extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'id'                                               => 'string',
        'title'                                            => 'string',
        'type'                                             => 'string',
        'should_use_contextual_feed'                       => 'bool',
    ];
}
