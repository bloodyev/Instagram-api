<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * BlockedReelsResponse.
 *
 * @method bool getBigList()
 * @method mixed getMessage()
 * @method string getNextMaxId()
 * @method int getPageSize()
 * @method mixed getSections()
 * @method string getStatus()
 * @method Model\User[] getUsers()
 * @method Model\_Message[] get_Messages()
 * @method bool isBigList()
 * @method bool isMessage()
 * @method bool isNextMaxId()
 * @method bool isPageSize()
 * @method bool isSections()
 * @method bool isStatus()
 * @method bool isUsers()
 * @method bool is_Messages()
 * @method $this setBigList(bool $value)
 * @method $this setMessage(mixed $value)
 * @method $this setNextMaxId(string $value)
 * @method $this setPageSize(int $value)
 * @method $this setSections(mixed $value)
 * @method $this setStatus(string $value)
 * @method $this setUsers(Model\User[] $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetBigList()
 * @method $this unsetMessage()
 * @method $this unsetNextMaxId()
 * @method $this unsetPageSize()
 * @method $this unsetSections()
 * @method $this unsetStatus()
 * @method $this unsetUsers()
 * @method $this unset_Messages()
 */
class BlockedReelsResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        Model\BlockedReels::class, // Import property map.
        'next_max_id' => 'string',
        'sections'    => '',
    ];
}
