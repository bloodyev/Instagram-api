<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * AccountAccessToolEntryData.
 *
 * @method AccountAccessToolSettingsPages[] getSettingsPages()
 * @method bool isSettingsPages()
 * @method $this setSettingsPages(AccountAccessToolSettingsPages[] $value)
 * @method $this unsetSettingsPages()
 */
class AccountAccessToolEntryData extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'SettingsPages'                 => 'AccountAccessToolSettingsPages[]',
    ];

    public function getDateJoined()
    {
        $this->_getProperty('SettingsPages');
    }
}
