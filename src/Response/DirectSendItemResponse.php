<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * DirectSendItemResponse.
 *
 * @method string getAction()
 * @method mixed getMessage()
 * @method mixed getPayload()
 * @method string getStatus()
 * @method string getStatusCode()
 * @method Model\_Message[] get_Messages()
 * @method bool isAction()
 * @method bool isMessage()
 * @method bool isPayload()
 * @method bool isStatus()
 * @method bool isStatusCode()
 * @method bool is_Messages()
 * @method $this setAction(string $value)
 * @method $this setMessage(mixed $value)
 * @method $this setPayload(mixed $value)
 * @method $this setStatus(string $value)
 * @method $this setStatusCode(string $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetAction()
 * @method $this unsetMessage()
 * @method $this unsetPayload()
 * @method $this unsetStatus()
 * @method $this unsetStatusCode()
 * @method $this unset_Messages()
 */
class DirectSendItemResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'action'      => 'string',
        'status_code' => 'string',
        'payload'     => '', // Model\DirectSendItemPayload
                             // The reason this is commented is because it
                             // can be both DirectSendItemPayload and
                             // DirectSendItemPayload[].
                             // TODO: Think about multiple answer solution.
    ];
}
