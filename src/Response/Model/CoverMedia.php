<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * CoverMedia.
 *
 * @method bool getCanViewerReshare()
 * @method bool getCanViewerSave()
 * @method string getCaption()
 * @method bool getCaptionIsEdited()
 * @method string getClientCacheKey()
 * @method string getCode()
 * @method int[] getCropRect()
 * @method ImageCandidate getCroppedImageVersion()
 * @method string getDeviceTimestamp()
 * @method int getFilterType()
 * @method ImageCandidate getFullImageVersion()
 * @method string getId()
 * @method Image_Versions2 getImageVersions2()
 * @method float getLat()
 * @method float getLng()
 * @method Location getLocation()
 * @method string getMediaId()
 * @method int getMediaType()
 * @method string getOrganicTrackingToken()
 * @method int getOriginalHeight()
 * @method int getOriginalWidth()
 * @method bool getPhotoOfYou()
 * @method string getPk()
 * @method string getTakenAt()
 * @method User getUser()
 * @method Usertag getUsertags()
 * @method bool isCanViewerReshare()
 * @method bool isCanViewerSave()
 * @method bool isCaption()
 * @method bool isCaptionIsEdited()
 * @method bool isClientCacheKey()
 * @method bool isCode()
 * @method bool isCropRect()
 * @method bool isCroppedImageVersion()
 * @method bool isDeviceTimestamp()
 * @method bool isFilterType()
 * @method bool isFullImageVersion()
 * @method bool isId()
 * @method bool isImageVersions2()
 * @method bool isLat()
 * @method bool isLng()
 * @method bool isLocation()
 * @method bool isMediaId()
 * @method bool isMediaType()
 * @method bool isOrganicTrackingToken()
 * @method bool isOriginalHeight()
 * @method bool isOriginalWidth()
 * @method bool isPhotoOfYou()
 * @method bool isPk()
 * @method bool isTakenAt()
 * @method bool isUser()
 * @method bool isUsertags()
 * @method $this setCanViewerReshare(bool $value)
 * @method $this setCanViewerSave(bool $value)
 * @method $this setCaption(string $value)
 * @method $this setCaptionIsEdited(bool $value)
 * @method $this setClientCacheKey(string $value)
 * @method $this setCode(string $value)
 * @method $this setCropRect(int[] $value)
 * @method $this setCroppedImageVersion(ImageCandidate $value)
 * @method $this setDeviceTimestamp(string $value)
 * @method $this setFilterType(int $value)
 * @method $this setFullImageVersion(ImageCandidate $value)
 * @method $this setId(string $value)
 * @method $this setImageVersions2(Image_Versions2 $value)
 * @method $this setLat(float $value)
 * @method $this setLng(float $value)
 * @method $this setLocation(Location $value)
 * @method $this setMediaId(string $value)
 * @method $this setMediaType(int $value)
 * @method $this setOrganicTrackingToken(string $value)
 * @method $this setOriginalHeight(int $value)
 * @method $this setOriginalWidth(int $value)
 * @method $this setPhotoOfYou(bool $value)
 * @method $this setPk(string $value)
 * @method $this setTakenAt(string $value)
 * @method $this setUser(User $value)
 * @method $this setUsertags(Usertag $value)
 * @method $this unsetCanViewerReshare()
 * @method $this unsetCanViewerSave()
 * @method $this unsetCaption()
 * @method $this unsetCaptionIsEdited()
 * @method $this unsetClientCacheKey()
 * @method $this unsetCode()
 * @method $this unsetCropRect()
 * @method $this unsetCroppedImageVersion()
 * @method $this unsetDeviceTimestamp()
 * @method $this unsetFilterType()
 * @method $this unsetFullImageVersion()
 * @method $this unsetId()
 * @method $this unsetImageVersions2()
 * @method $this unsetLat()
 * @method $this unsetLng()
 * @method $this unsetLocation()
 * @method $this unsetMediaId()
 * @method $this unsetMediaType()
 * @method $this unsetOrganicTrackingToken()
 * @method $this unsetOriginalHeight()
 * @method $this unsetOriginalWidth()
 * @method $this unsetPhotoOfYou()
 * @method $this unsetPk()
 * @method $this unsetTakenAt()
 * @method $this unsetUser()
 * @method $this unsetUsertags()
 */
class CoverMedia extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'id'              => 'string',
        'media_id'        => 'string',
        /*
         * A number describing what type of media this is.
         */
        'media_type'                => 'int',
        'image_versions2'           => 'Image_Versions2',
        'original_width'            => 'int',
        'original_height'           => 'int',
        'cropped_image_version'     => 'ImageCandidate',
        'crop_rect'                 => 'int[]',
        'full_image_version'        => 'ImageCandidate',
        'can_viewer_reshare'        => 'bool',
        'can_viewer_save'           => 'bool',
        'caption'                   => 'string',
        'caption_is_edited'         => 'bool',
        'client_cache_key'          => 'string',
        'code'                      => 'string',
        'device_timestamp'          => 'string',
        'filter_type'               => 'int',
        'lat'                       => 'float',
        'lng'                       => 'float',
        'location'                  => 'Location',
        'organic_tracking_token'    => 'string',
        'photo_of_you'              => 'bool',
        'pk'                        => 'string',
        'taken_at'                  => 'string',
        'user'                      => 'User',
        'usertags'                  => 'Usertag',
    ];
}
