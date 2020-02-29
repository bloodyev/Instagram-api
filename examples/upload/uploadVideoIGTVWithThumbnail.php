<?php

set_time_limit(0);
date_default_timezone_set('UTC');

require __DIR__.'/../../vendor/autoload.php';

/////// CONFIG ///////
$username = '';
$password = '';
$debug = true;
$truncatedDebug = false;
//////////////////////

/////// MEDIA ////////
$videoFilename = '';
$coverPhoto = '';
//////////////////////

$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);

try {
    $ig->login($username, $password);
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
    exit(0);
}

try {
    $metadata = [
        'cover_photo' => $coverPhoto, // Video thumbnail
    ];

    $video = new \InstagramAPI\Media\Photo\InstagramVideo($videoFilename, ['targetFeed' => \InstagramAPI\Constants::FEED_TV]);
    $ig->tv->uploadVideo($video->getFile(), $metadata);
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
}
