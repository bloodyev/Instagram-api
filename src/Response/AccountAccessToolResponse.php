<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * AccountAccessToolResponse.
 *
 * @method string getBundleVariant()
 * @method Model\AccountAccessToolConfig getConfig()
 * @method string getCountryCode()
 * @method string getDeploymentStage()
 * @method Model\AccountAccessToolEntryData getEntryData()
 * @method string getHostname()
 * @method string getLanguageCode()
 * @method mixed getMessage()
 * @method string getMidPct()
 * @method string getNonce()
 * @method string getPlatform()
 * @method string getRolloutHash()
 * @method string getStatus()
 * @method Model\_Message[] get_Messages()
 * @method bool isBundleVariant()
 * @method bool isConfig()
 * @method bool isCountryCode()
 * @method bool isDeploymentStage()
 * @method bool isEntryData()
 * @method bool isHostname()
 * @method bool isLanguageCode()
 * @method bool isMessage()
 * @method bool isMidPct()
 * @method bool isNonce()
 * @method bool isPlatform()
 * @method bool isRolloutHash()
 * @method bool isStatus()
 * @method bool is_Messages()
 * @method $this setBundleVariant(string $value)
 * @method $this setConfig(Model\AccountAccessToolConfig $value)
 * @method $this setCountryCode(string $value)
 * @method $this setDeploymentStage(string $value)
 * @method $this setEntryData(Model\AccountAccessToolEntryData $value)
 * @method $this setHostname(string $value)
 * @method $this setLanguageCode(string $value)
 * @method $this setMessage(mixed $value)
 * @method $this setMidPct(string $value)
 * @method $this setNonce(string $value)
 * @method $this setPlatform(string $value)
 * @method $this setRolloutHash(string $value)
 * @method $this setStatus(string $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetBundleVariant()
 * @method $this unsetConfig()
 * @method $this unsetCountryCode()
 * @method $this unsetDeploymentStage()
 * @method $this unsetEntryData()
 * @method $this unsetHostname()
 * @method $this unsetLanguageCode()
 * @method $this unsetMessage()
 * @method $this unsetMidPct()
 * @method $this unsetNonce()
 * @method $this unsetPlatform()
 * @method $this unsetRolloutHash()
 * @method $this unsetStatus()
 * @method $this unset_Messages()
 */
class AccountAccessToolResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'config'           => 'Model\AccountAccessToolConfig',
        'country_code'     => 'string',
        'language_code'    => 'string',
        'entry_data'       => 'Model\AccountAccessToolEntryData',
        'hostname'         => 'string',
        'deployment_stage' => 'string',
        'platform'         => 'string',
        'nonce'            => 'string',
        'mid_pct'          => 'string',
        'rollout_hash'     => 'string',
        'bundle_variant'   => 'string',
    ];

    public function getDateJoined()
    {
        return $this->_getProperty('entry_data')->_getProperty('SettingsPages')[0]->_getProperty('date_joined')->_getProperty('data')->_getProperty('timestamp');
    }

    public function getDateSwitchedToBusiness()
    {
        return $this->_getProperty('entry_data')->_getProperty('SettingsPages')[0]->_getProperty('switched_to_business')->_getProperty('data')->_getProperty('timestamp');
    }
}
