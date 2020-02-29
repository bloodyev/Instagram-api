<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * BroadcastJoinResponse.
 *
 * @method string getEncodedServerDataInfo()
 * @method mixed getMessage()
 * @method string getSdpResponse()
 * @method Model\ServerDataInfo getServerDataInfo()
 * @method string getStatus()
 * @method Model\_Message[] get_Messages()
 * @method bool isEncodedServerDataInfo()
 * @method bool isMessage()
 * @method bool isSdpResponse()
 * @method bool isServerDataInfo()
 * @method bool isStatus()
 * @method bool is_Messages()
 * @method $this setEncodedServerDataInfo(string $value)
 * @method $this setMessage(mixed $value)
 * @method $this setSdpResponse(string $value)
 * @method $this setServerDataInfo(Model\ServerDataInfo $value)
 * @method $this setStatus(string $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetEncodedServerDataInfo()
 * @method $this unsetMessage()
 * @method $this unsetSdpResponse()
 * @method $this unsetServerDataInfo()
 * @method $this unsetStatus()
 * @method $this unset_Messages()
 */
class BroadcastJoinResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'sdp_response'             => 'string',
        'server_data_info'         => 'Model\ServerDataInfo',
        'encoded_server_data_info' => 'string',
    ];
}
