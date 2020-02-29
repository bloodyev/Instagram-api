<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * Media.
 *
 * @method bool getCommentThreadingEnabled()
 * @method string getDest()
 * @method mixed getExpiringAt()
 * @method string getId()
 * @method string getImage()
 * @method int getOriginalHeight()
 * @method int getOriginalWidth()
 * @method User getUser()
 * @method bool isCommentThreadingEnabled()
 * @method bool isDest()
 * @method bool isExpiringAt()
 * @method bool isId()
 * @method bool isImage()
 * @method bool isOriginalHeight()
 * @method bool isOriginalWidth()
 * @method bool isUser()
 * @method $this setCommentThreadingEnabled(bool $value)
 * @method $this setDest(string $value)
 * @method $this setExpiringAt(mixed $value)
 * @method $this setId(string $value)
 * @method $this setImage(string $value)
 * @method $this setOriginalHeight(int $value)
 * @method $this setOriginalWidth(int $value)
 * @method $this setUser(User $value)
 * @method $this unsetCommentThreadingEnabled()
 * @method $this unsetDest()
 * @method $this unsetExpiringAt()
 * @method $this unsetId()
 * @method $this unsetImage()
 * @method $this unsetOriginalHeight()
 * @method $this unsetOriginalWidth()
 * @method $this unsetUser()
 */
class Media extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'image'                            => 'string',
        'id'                               => 'string',
        'user'                             => 'User',
        'expiring_at'                      => '',
        'comment_threading_enabled'        => 'bool',
        'dest'                             => 'string',
        'original_height'                  => 'int',
        'original_width'                   => 'int',
    ];
}
