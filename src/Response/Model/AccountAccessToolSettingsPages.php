<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * AccountAccessToolSettingsPages.
 *
 * @method AccountAccessToolSettingsProperties getDateJoined()
 * @method AccountAccessToolSettingsProperties getSwitchedToBusiness()
 * @method bool isDateJoined()
 * @method bool isSwitchedToBusiness()
 * @method $this setDateJoined(AccountAccessToolSettingsProperties $value)
 * @method $this setSwitchedToBusiness(AccountAccessToolSettingsProperties $value)
 * @method $this unsetDateJoined()
 * @method $this unsetSwitchedToBusiness()
 */
class AccountAccessToolSettingsPages extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'date_joined'                 => 'AccountAccessToolSettingsProperties',
        'switched_to_business'        => 'AccountAccessToolSettingsProperties',
    ];
}
