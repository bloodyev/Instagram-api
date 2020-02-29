<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * LoomFetchConfigResponse.
 *
 * @method bool getGATE_APP_VERSION()
 * @method mixed getI()
 * @method int getId()
 * @method mixed getMessage()
 * @method mixed getN()
 * @method mixed getP()
 * @method mixed getS()
 * @method string getStatus()
 * @method Model\SystemControl getSystemControl()
 * @method mixed getT()
 * @method Model\TraceControl getTraceControl()
 * @method mixed getV()
 * @method Model\_Message[] get_Messages()
 * @method bool isGATE_APP_VERSION()
 * @method bool isI()
 * @method bool isId()
 * @method bool isMessage()
 * @method bool isN()
 * @method bool isP()
 * @method bool isS()
 * @method bool isStatus()
 * @method bool isSystemControl()
 * @method bool isT()
 * @method bool isTraceControl()
 * @method bool isV()
 * @method bool is_Messages()
 * @method $this setGATE_APP_VERSION(bool $value)
 * @method $this setI(mixed $value)
 * @method $this setId(int $value)
 * @method $this setMessage(mixed $value)
 * @method $this setN(mixed $value)
 * @method $this setP(mixed $value)
 * @method $this setS(mixed $value)
 * @method $this setStatus(string $value)
 * @method $this setSystemControl(Model\SystemControl $value)
 * @method $this setT(mixed $value)
 * @method $this setTraceControl(Model\TraceControl $value)
 * @method $this setV(mixed $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetGATE_APP_VERSION()
 * @method $this unsetI()
 * @method $this unsetId()
 * @method $this unsetMessage()
 * @method $this unsetN()
 * @method $this unsetP()
 * @method $this unsetS()
 * @method $this unsetStatus()
 * @method $this unsetSystemControl()
 * @method $this unsetT()
 * @method $this unsetTraceControl()
 * @method $this unsetV()
 * @method $this unset_Messages()
 */
class LoomFetchConfigResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'system_control'   => 'Model\SystemControl',
        'GATE_APP_VERSION' => 'bool',
        'trace_control'    => 'Model\TraceControl',
        'id'               => 'int',
        'i'                => '',
        'n'                => '',
        'p'                => '',
        's'                => '',
        't'                => '',
        'v'                => '',
    ];
}
