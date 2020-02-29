<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * WebFollowResponse.
 *
 * @method mixed getMessage()
 * @method string getResult()
 * @method string getStatus()
 * @method Model\_Message[] get_Messages()
 * @method bool isMessage()
 * @method bool isResult()
 * @method bool isStatus()
 * @method bool is_Messages()
 * @method $this setMessage(mixed $value)
 * @method $this setResult(string $value)
 * @method $this setStatus(string $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetMessage()
 * @method $this unsetResult()
 * @method $this unsetStatus()
 * @method $this unset_Messages()
 */
class WebFollowResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'result'           => 'string',
    ];
}
