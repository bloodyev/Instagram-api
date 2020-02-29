<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * BlockedReels.
 *
 * @method bool getBigList()
 * @method int getPageSize()
 * @method User[] getUsers()
 * @method bool isBigList()
 * @method bool isPageSize()
 * @method bool isUsers()
 * @method $this setBigList(bool $value)
 * @method $this setPageSize(int $value)
 * @method $this setUsers(User[] $value)
 * @method $this unsetBigList()
 * @method $this unsetPageSize()
 * @method $this unsetUsers()
 */
class BlockedReels extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'users'     => 'User[]',
        'page_size' => 'int',
        'big_list'  => 'bool',
    ];
}
