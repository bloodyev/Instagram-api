<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * AdditionalCandidate.
 *
 * @method ImageCandidate getIgtvFirstFrame()
 * @method bool isIgtvFirstFrame()
 * @method $this setIgtvFirstFrame(ImageCandidate $value)
 * @method $this unsetIgtvFirstFrame()
 */
class AdditionalCandidate extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'igtv_first_frame'                          => 'ImageCandidate',
    ];
}
