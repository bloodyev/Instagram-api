<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * AccountAccessToolSettingsProperties.
 *
 * @method string getCursor()
 * @method AccountAccessToolSettingsData getData()
 * @method string getLink()
 * @method bool isCursor()
 * @method bool isData()
 * @method bool isLink()
 * @method $this setCursor(string $value)
 * @method $this setData(AccountAccessToolSettingsData $value)
 * @method $this setLink(string $value)
 * @method $this unsetCursor()
 * @method $this unsetData()
 * @method $this unsetLink()
 */
class AccountAccessToolSettingsProperties extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'link'                 => 'string',
        'data'                 => 'AccountAccessToolSettingsData',
        'cursor'               => 'string',
    ];
}
