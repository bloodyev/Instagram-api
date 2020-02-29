<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * NullstateDynamicSectionsResponse.
 *
 * @method mixed getMessage()
 * @method Model\Section[] getSections()
 * @method string getStatus()
 * @method Model\_Message[] get_Messages()
 * @method bool isMessage()
 * @method bool isSections()
 * @method bool isStatus()
 * @method bool is_Messages()
 * @method $this setMessage(mixed $value)
 * @method $this setSections(Model\Section[] $value)
 * @method $this setStatus(string $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetMessage()
 * @method $this unsetSections()
 * @method $this unsetStatus()
 * @method $this unset_Messages()
 */
class NullstateDynamicSectionsResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'sections'             => 'Model\Section[]',
    ];
}
