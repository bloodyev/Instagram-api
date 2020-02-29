<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * Shopping.
 *
 * @method Cluster getCluster()
 * @method CoverMedia[] getCoverMedias()
 * @method string getCoverTitle()
 * @method string getId()
 * @method ShoppingType getShoppingTypeModel()
 * @method bool getShouldShowIcon()
 * @method bool isCluster()
 * @method bool isCoverMedias()
 * @method bool isCoverTitle()
 * @method bool isId()
 * @method bool isShoppingTypeModel()
 * @method bool isShouldShowIcon()
 * @method $this setCluster(Cluster $value)
 * @method $this setCoverMedias(CoverMedia[] $value)
 * @method $this setCoverTitle(string $value)
 * @method $this setId(string $value)
 * @method $this setShoppingTypeModel(ShoppingType $value)
 * @method $this setShouldShowIcon(bool $value)
 * @method $this unsetCluster()
 * @method $this unsetCoverMedias()
 * @method $this unsetCoverTitle()
 * @method $this unsetId()
 * @method $this unsetShoppingTypeModel()
 * @method $this unsetShouldShowIcon()
 */
class Shopping extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'id'                                     => 'string',
        'cluster'                                => 'Cluster',
        'cover_medias'                           => 'CoverMedia[]',
        'should_show_icon'                       => 'bool',
        'cover_title'                            => 'string',
        'shopping_type_model'                    => 'ShoppingType',
    ];
}
