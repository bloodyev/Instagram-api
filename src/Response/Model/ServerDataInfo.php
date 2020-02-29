<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * ServerDataInfo.
 *
 * @method string getCluster()
 * @method string getConferenceName()
 * @method string getNonce()
 * @method Thread[] getThread()
 * @method User[] getUser()
 * @method bool isCluster()
 * @method bool isConferenceName()
 * @method bool isNonce()
 * @method bool isThread()
 * @method bool isUser()
 * @method $this setCluster(string $value)
 * @method $this setConferenceName(string $value)
 * @method $this setNonce(string $value)
 * @method $this setThread(Thread[] $value)
 * @method $this setUser(User[] $value)
 * @method $this unsetCluster()
 * @method $this unsetConferenceName()
 * @method $this unsetNonce()
 * @method $this unsetThread()
 * @method $this unsetUser()
 */
class ServerDataInfo extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'cluster'                => 'string',
        'nonce'                  => 'string',
        'conferenceName'         => 'string',
        'thread'                 => 'Thread[]',
        'user'                   => 'User[]',
    ];
}
