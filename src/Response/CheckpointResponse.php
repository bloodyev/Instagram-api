<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * CheckpointResponse.
 *
 * @method Model\Challenge getChallenge()
 * @method mixed getMessage()
 * @method string getNonceCode()
 * @method string getStatus()
 * @method Model\StepData getStepData()
 * @method string getStepName()
 * @method string getUserId()
 * @method Model\_Message[] get_Messages()
 * @method bool isChallenge()
 * @method bool isMessage()
 * @method bool isNonceCode()
 * @method bool isStatus()
 * @method bool isStepData()
 * @method bool isStepName()
 * @method bool isUserId()
 * @method bool is_Messages()
 * @method $this setChallenge(Model\Challenge $value)
 * @method $this setMessage(mixed $value)
 * @method $this setNonceCode(string $value)
 * @method $this setStatus(string $value)
 * @method $this setStepData(Model\StepData $value)
 * @method $this setStepName(string $value)
 * @method $this setUserId(string $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetChallenge()
 * @method $this unsetMessage()
 * @method $this unsetNonceCode()
 * @method $this unsetStatus()
 * @method $this unsetStepData()
 * @method $this unsetStepName()
 * @method $this unsetUserId()
 * @method $this unset_Messages()
 */
class CheckpointResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'step_name'      => 'string',
        'challenge'      => 'Model\Challenge',
        'step_data'      => 'Model\StepData',
        'user_id'        => 'string',
        'nonce_code'     => 'string',
    ];
}
