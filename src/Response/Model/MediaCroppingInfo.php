<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * MediaCroppingInfo.
 *
 * @method mixed getFeedPreviewCrop()
 * @method mixed getProfileGridCrop()
 * @method mixed getSquareCrop()
 * @method bool isFeedPreviewCrop()
 * @method bool isProfileGridCrop()
 * @method bool isSquareCrop()
 * @method $this setFeedPreviewCrop(mixed $value)
 * @method $this setProfileGridCrop(mixed $value)
 * @method $this setSquareCrop(mixed $value)
 * @method $this unsetFeedPreviewCrop()
 * @method $this unsetProfileGridCrop()
 * @method $this unsetSquareCrop()
 */
class MediaCroppingInfo extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'profile_grid_crop' => '',
        'feed_preview_crop' => '',
        'square_crop'       => '',
    ];
}
