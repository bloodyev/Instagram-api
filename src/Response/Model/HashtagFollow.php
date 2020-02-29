<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * HashtagFollow.
 *
 * @method int getFollowStatus()
 * @method string getId()
 * @method string getName()
 * @method bool isFollowStatus()
 * @method bool isId()
 * @method bool isName()
 * @method $this setFollowStatus(int $value)
 * @method $this setId(string $value)
 * @method $this setName(string $value)
 * @method $this unsetFollowStatus()
 * @method $this unsetId()
 * @method $this unsetName()
 */
class HashtagFollow extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'id'                                     => 'string',
        'name'                                   => 'string',
        'follow_status'                          => 'int',
    ];
}
