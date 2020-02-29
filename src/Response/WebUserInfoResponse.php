<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * WebUserInfoResponse.
 *
 * @method Model\Graphql getGraphql()
 * @method string getLoggingPageId()
 * @method mixed getMessage()
 * @method bool getShowFollowDialog()
 * @method bool getShowSuggestedProfiles()
 * @method string getStatus()
 * @method mixed getToastContentOnLoad()
 * @method Model\_Message[] get_Messages()
 * @method bool isGraphql()
 * @method bool isLoggingPageId()
 * @method bool isMessage()
 * @method bool isShowFollowDialog()
 * @method bool isShowSuggestedProfiles()
 * @method bool isStatus()
 * @method bool isToastContentOnLoad()
 * @method bool is_Messages()
 * @method $this setGraphql(Model\Graphql $value)
 * @method $this setLoggingPageId(string $value)
 * @method $this setMessage(mixed $value)
 * @method $this setShowFollowDialog(bool $value)
 * @method $this setShowSuggestedProfiles(bool $value)
 * @method $this setStatus(string $value)
 * @method $this setToastContentOnLoad(mixed $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetGraphql()
 * @method $this unsetLoggingPageId()
 * @method $this unsetMessage()
 * @method $this unsetShowFollowDialog()
 * @method $this unsetShowSuggestedProfiles()
 * @method $this unsetStatus()
 * @method $this unsetToastContentOnLoad()
 * @method $this unset_Messages()
 */
class WebUserInfoResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'logging_page_id'             => 'string',
        'show_suggested_profiles'     => 'bool',
        'show_follow_dialog'          => 'bool',
        'graphql'                     => 'Model\Graphql',
        'toast_content_on_load'       => '',
    ];
}
