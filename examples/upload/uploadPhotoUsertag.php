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
$photoFilename = '';
$userId = '';
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
        'usertags' => [
            'in' => [
                [
                    'position' => [0.5, 0.5], // X and Y pos (from 0.0 to 1.0)
                    'user_id'  => $userId,          // Must be a numerical UserPK ID.
                ],
            ],
        ],
    ];

    $photo = new \InstagramAPI\Media\Photo\InstagramPhoto($photoFilename);
    $ig->timeline->uploadPhoto($photo->getFile(), $metadata);
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
}
