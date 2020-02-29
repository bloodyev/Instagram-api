<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * Graphql.
 *
 * @method User getUser()
 * @method bool isUser()
 * @method $this setUser(User $value)
 * @method $this unsetUser()
 */
class Graphql extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'user'      => 'User',
    ];
}
