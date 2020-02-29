<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * LocationInfoResponse.
 *
 * @method string getCategory()
 * @method string getFacebookPlacesId()
 * @method mixed getHours()
 * @method mixed getIgBusiness()
 * @method mixed getLocationAddress()
 * @method mixed getLocationCity()
 * @method string getLocationId()
 * @method int getLocationRegion()
 * @method string getLocationZip()
 * @method mixed getMessage()
 * @method string getName()
 * @method string getPhone()
 * @method int getPriceRange()
 * @method bool getShowLocationPageSurvey()
 * @method string getStatus()
 * @method string getWebsite()
 * @method Model\_Message[] get_Messages()
 * @method bool isCategory()
 * @method bool isFacebookPlacesId()
 * @method bool isHours()
 * @method bool isIgBusiness()
 * @method bool isLocationAddress()
 * @method bool isLocationCity()
 * @method bool isLocationId()
 * @method bool isLocationRegion()
 * @method bool isLocationZip()
 * @method bool isMessage()
 * @method bool isName()
 * @method bool isPhone()
 * @method bool isPriceRange()
 * @method bool isShowLocationPageSurvey()
 * @method bool isStatus()
 * @method bool isWebsite()
 * @method bool is_Messages()
 * @method $this setCategory(string $value)
 * @method $this setFacebookPlacesId(string $value)
 * @method $this setHours(mixed $value)
 * @method $this setIgBusiness(mixed $value)
 * @method $this setLocationAddress(mixed $value)
 * @method $this setLocationCity(mixed $value)
 * @method $this setLocationId(string $value)
 * @method $this setLocationRegion(int $value)
 * @method $this setLocationZip(string $value)
 * @method $this setMessage(mixed $value)
 * @method $this setName(string $value)
 * @method $this setPhone(string $value)
 * @method $this setPriceRange(int $value)
 * @method $this setShowLocationPageSurvey(bool $value)
 * @method $this setStatus(string $value)
 * @method $this setWebsite(string $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetCategory()
 * @method $this unsetFacebookPlacesId()
 * @method $this unsetHours()
 * @method $this unsetIgBusiness()
 * @method $this unsetLocationAddress()
 * @method $this unsetLocationCity()
 * @method $this unsetLocationId()
 * @method $this unsetLocationRegion()
 * @method $this unsetLocationZip()
 * @method $this unsetMessage()
 * @method $this unsetName()
 * @method $this unsetPhone()
 * @method $this unsetPriceRange()
 * @method $this unsetShowLocationPageSurvey()
 * @method $this unsetStatus()
 * @method $this unsetWebsite()
 * @method $this unset_Messages()
 */
class LocationInfoResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'location_id'               => 'string',
        'facebook_places_id'        => 'string',
        'name'                      => 'string',
        'phone'                     => 'string',
        'website'                   => 'string',
        'category'                  => 'string',
        'price_range'               => 'int',
        'hours'                     => '',
        'location_address'          => '',
        'location_city'             => '',
        'location_region'           => 'int',
        'location_zip'              => 'string',
        'ig_business'               => '',
        'show_location_page_survey' => 'bool',
    ];
}
