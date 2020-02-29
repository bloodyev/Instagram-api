<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * AnonymousProfilePictureResponse.
 *
 * @method int getHeight()
 * @method mixed getMessage()
 * @method string getStatus()
 * @method string getUrl()
 * @method int getWidth()
 * @method Model\_Message[] get_Messages()
 * @method bool isHeight()
 * @method bool isMessage()
 * @method bool isStatus()
 * @method bool isUrl()
 * @method bool isWidth()
 * @method bool is_Messages()
 * @method $this setHeight(int $value)
 * @method $this setMessage(mixed $value)
 * @method $this setStatus(string $value)
 * @method $this setUrl(string $value)
 * @method $this setWidth(int $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetHeight()
 * @method $this unsetMessage()
 * @method $this unsetStatus()
 * @method $this unsetUrl()
 * @method $this unsetWidth()
 * @method $this unset_Messages()
 */
class AnonymousProfilePictureResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'url'             => 'string',
        'width'           => 'int',
        'height'          => 'int',
    ];
}
