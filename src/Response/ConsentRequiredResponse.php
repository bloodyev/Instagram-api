<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * ConsentRequiredResponse.
 *
 * @method mixed getContents()
 * @method mixed getMessage()
 * @method string getPrimaryButtonText()
 * @method string getScreenKey()
 * @method string getStatus()
 * @method string getTosVersion()
 * @method Model\_Message[] get_Messages()
 * @method bool isContents()
 * @method bool isMessage()
 * @method bool isPrimaryButtonText()
 * @method bool isScreenKey()
 * @method bool isStatus()
 * @method bool isTosVersion()
 * @method bool is_Messages()
 * @method $this setContents(mixed $value)
 * @method $this setMessage(mixed $value)
 * @method $this setPrimaryButtonText(string $value)
 * @method $this setScreenKey(string $value)
 * @method $this setStatus(string $value)
 * @method $this setTosVersion(string $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetContents()
 * @method $this unsetMessage()
 * @method $this unsetPrimaryButtonText()
 * @method $this unsetScreenKey()
 * @method $this unsetStatus()
 * @method $this unsetTosVersion()
 * @method $this unset_Messages()
 */
class ConsentRequiredResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'screen_key'             => 'string',
        'primary_button_text'    => 'string',
        'tos_version'            => 'string',
        'contents'               => '',
    ];
}
