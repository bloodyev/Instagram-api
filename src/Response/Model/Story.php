<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * Story.
 *
 * @method Args getArgs()
 * @method string getChainType()
 * @method Counts getCounts()
 * @method string getDesign()
 * @method string getId()
 * @method bool getIsPortrait()
 * @method string getPk()
 * @method Reel getSeedReel()
 * @method int getStoryType()
 * @method int getType()
 * @method bool isArgs()
 * @method bool isChainType()
 * @method bool isCounts()
 * @method bool isDesign()
 * @method bool isId()
 * @method bool isIsPortrait()
 * @method bool isPk()
 * @method bool isSeedReel()
 * @method bool isStoryType()
 * @method bool isType()
 * @method $this setArgs(Args $value)
 * @method $this setChainType(string $value)
 * @method $this setCounts(Counts $value)
 * @method $this setDesign(string $value)
 * @method $this setId(string $value)
 * @method $this setIsPortrait(bool $value)
 * @method $this setPk(string $value)
 * @method $this setSeedReel(Reel $value)
 * @method $this setStoryType(int $value)
 * @method $this setType(int $value)
 * @method $this unsetArgs()
 * @method $this unsetChainType()
 * @method $this unsetCounts()
 * @method $this unsetDesign()
 * @method $this unsetId()
 * @method $this unsetIsPortrait()
 * @method $this unsetPk()
 * @method $this unsetSeedReel()
 * @method $this unsetStoryType()
 * @method $this unsetType()
 */
class Story extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'pk'            => 'string',
        'counts'        => 'Counts',
        'args'          => 'Args',
        'type'          => 'int',
        'story_type'    => 'int',
        'chain_type'    => 'string',
        'design'        => 'string',
        'id'            => 'string',
        'is_portrait'   => 'bool',
        'seed_reel'     => 'Reel',
    ];
}
