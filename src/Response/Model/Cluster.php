<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * Cluster.
 *
 * @method bool getCanMute()
 * @method string getContext()
 * @method string getDebugInfo()
 * @method string getDescription()
 * @method mixed getFollowedHashtags()
 * @method string getId()
 * @method bool getIsMuted()
 * @method mixed getLabels()
 * @method string getName()
 * @method int getRankedPosition()
 * @method string getTitle()
 * @method string getType()
 * @method bool isCanMute()
 * @method bool isContext()
 * @method bool isDebugInfo()
 * @method bool isDescription()
 * @method bool isFollowedHashtags()
 * @method bool isId()
 * @method bool isIsMuted()
 * @method bool isLabels()
 * @method bool isName()
 * @method bool isRankedPosition()
 * @method bool isTitle()
 * @method bool isType()
 * @method $this setCanMute(bool $value)
 * @method $this setContext(string $value)
 * @method $this setDebugInfo(string $value)
 * @method $this setDescription(string $value)
 * @method $this setFollowedHashtags(mixed $value)
 * @method $this setId(string $value)
 * @method $this setIsMuted(bool $value)
 * @method $this setLabels(mixed $value)
 * @method $this setName(string $value)
 * @method $this setRankedPosition(int $value)
 * @method $this setTitle(string $value)
 * @method $this setType(string $value)
 * @method $this unsetCanMute()
 * @method $this unsetContext()
 * @method $this unsetDebugInfo()
 * @method $this unsetDescription()
 * @method $this unsetFollowedHashtags()
 * @method $this unsetId()
 * @method $this unsetIsMuted()
 * @method $this unsetLabels()
 * @method $this unsetName()
 * @method $this unsetRankedPosition()
 * @method $this unsetTitle()
 * @method $this unsetType()
 */
class Cluster extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'id'                          => 'string',
        'title'                       => 'string',
        'context'                     => 'string',
        'description'                 => 'string',
        'followed_hashtags'           => '',
        'labels'                      => '',
        'name'                        => 'string',
        'can_mute'                    => 'bool',
        'is_muted'                    => 'bool',
        'type'                        => 'string',
        'debug_info'                  => 'string',
        'ranked_position'             => 'int',
    ];
}
