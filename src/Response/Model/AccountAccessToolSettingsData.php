<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * AccountAccessToolSettingsData.
 *
 * @method string getText()
 * @method string getTimestamp()
 * @method bool isText()
 * @method bool isTimestamp()
 * @method $this setText(string $value)
 * @method $this setTimestamp(string $value)
 * @method $this unsetText()
 * @method $this unsetTimestamp()
 */
class AccountAccessToolSettingsData extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'text'                 => 'string',
        'timestamp'            => 'string',
    ];
}
