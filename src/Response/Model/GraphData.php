<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * GraphData.
 *
 * @method CatalogData getCatalogItems()
 * @method mixed getError()
 * @method MeGraphData getMe()
 * @method Item getMedia()
 * @method string getName()
 * @method GraphNode getNode()
 * @method ShadowInstagramUser getUser()
 * @method string get__Typename()
 * @method bool isCatalogItems()
 * @method bool isError()
 * @method bool isMe()
 * @method bool isMedia()
 * @method bool isName()
 * @method bool isNode()
 * @method bool isUser()
 * @method bool is__Typename()
 * @method $this setCatalogItems(CatalogData $value)
 * @method $this setError(mixed $value)
 * @method $this setMe(MeGraphData $value)
 * @method $this setMedia(Item $value)
 * @method $this setName(string $value)
 * @method $this setNode(GraphNode $value)
 * @method $this setUser(ShadowInstagramUser $value)
 * @method $this set__Typename(string $value)
 * @method $this unsetCatalogItems()
 * @method $this unsetError()
 * @method $this unsetMe()
 * @method $this unsetMedia()
 * @method $this unsetName()
 * @method $this unsetNode()
 * @method $this unsetUser()
 * @method $this unset__Typename()
 */
class GraphData extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'node'          => 'GraphNode',
        '__typename'    => 'string',
        'name'          => 'string',
        'user'          => 'ShadowInstagramUser',
        'error'         => '',
        'catalog_items' => 'CatalogData',
        'me'            => 'MeGraphData',
        'media'         => 'Item',
    ];
}
