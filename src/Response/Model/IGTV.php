<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * IGTV.
 *
 * @method bool getDisplayContentMetadata()
 * @method Item getMedia()
 * @method mixed getTvGuide()
 * @method bool isDisplayContentMetadata()
 * @method bool isMedia()
 * @method bool isTvGuide()
 * @method $this setDisplayContentMetadata(bool $value)
 * @method $this setMedia(Item $value)
 * @method $this setTvGuide(mixed $value)
 * @method $this unsetDisplayContentMetadata()
 * @method $this unsetMedia()
 * @method $this unsetTvGuide()
 */
class IGTV extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'media'                     => 'item',
        'display_content_metadata'  => 'bool',
        'tv_guide'                  => '',
    ];
}
