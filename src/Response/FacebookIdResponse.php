<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * FacebookIdResponse.
 *
 * @method string getFbid()
 * @method mixed getMessage()
 * @method string getStatus()
 * @method Model\_Message[] get_Messages()
 * @method bool isFbid()
 * @method bool isMessage()
 * @method bool isStatus()
 * @method bool is_Messages()
 * @method $this setFbid(string $value)
 * @method $this setMessage(mixed $value)
 * @method $this setStatus(string $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetFbid()
 * @method $this unsetMessage()
 * @method $this unsetStatus()
 * @method $this unset_Messages()
 */
class FacebookIdResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'fbid'             => 'string',
    ];
}
