<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * BusinessWhitelistSettingsResponse.
 *
 * @method mixed getMessage()
 * @method bool getRequireApproval()
 * @method string getStatus()
 * @method mixed getWhitelistedUsers()
 * @method Model\_Message[] get_Messages()
 * @method bool isMessage()
 * @method bool isRequireApproval()
 * @method bool isStatus()
 * @method bool isWhitelistedUsers()
 * @method bool is_Messages()
 * @method $this setMessage(mixed $value)
 * @method $this setRequireApproval(bool $value)
 * @method $this setStatus(string $value)
 * @method $this setWhitelistedUsers(mixed $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetMessage()
 * @method $this unsetRequireApproval()
 * @method $this unsetStatus()
 * @method $this unsetWhitelistedUsers()
 * @method $this unset_Messages()
 */
class BusinessWhitelistSettingsResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'require_approval'                      => 'bool',
        'whitelisted_users'                     => '',
    ];
}
