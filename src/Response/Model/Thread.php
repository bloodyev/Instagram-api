<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * Thread.
 *
 * @method bool getCanonical()
 * @method bool getNamed()
 * @method bool getPending()
 * @method string getThreadId()
 * @method string getThreadTitle()
 * @method string getThreadType()
 * @method User[] getUsers()
 * @method string getViewerId()
 * @method bool isCanonical()
 * @method bool isNamed()
 * @method bool isPending()
 * @method bool isThreadId()
 * @method bool isThreadTitle()
 * @method bool isThreadType()
 * @method bool isUsers()
 * @method bool isViewerId()
 * @method $this setCanonical(bool $value)
 * @method $this setNamed(bool $value)
 * @method $this setPending(bool $value)
 * @method $this setThreadId(string $value)
 * @method $this setThreadTitle(string $value)
 * @method $this setThreadType(string $value)
 * @method $this setUsers(User[] $value)
 * @method $this setViewerId(string $value)
 * @method $this unsetCanonical()
 * @method $this unsetNamed()
 * @method $this unsetPending()
 * @method $this unsetThreadId()
 * @method $this unsetThreadTitle()
 * @method $this unsetThreadType()
 * @method $this unsetUsers()
 * @method $this unsetViewerId()
 */
class Thread extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'thread_id'                          => 'string',
        'users'                              => 'User[]',
        'canonical'                          => 'bool',
        'named'                              => 'bool',
        'thread_title'                       => 'string',
        'pending'                            => 'bool',
        'thread_type'                        => 'string',
        'viewer_id'                          => 'string',
    ];
}
