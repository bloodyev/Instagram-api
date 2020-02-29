<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * PostInsightsResponse.
 *
 * @method Model\GraphData getData()
 * @method mixed getMessage()
 * @method string getStatus()
 * @method Model\_Message[] get_Messages()
 * @method bool isData()
 * @method bool isMessage()
 * @method bool isStatus()
 * @method bool is_Messages()
 * @method $this setData(Model\GraphData $value)
 * @method $this setMessage(mixed $value)
 * @method $this setStatus(string $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetData()
 * @method $this unsetMessage()
 * @method $this unsetStatus()
 * @method $this unset_Messages()
 */
class PostInsightsResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'data'             => 'Model\GraphData',
    ];
}
