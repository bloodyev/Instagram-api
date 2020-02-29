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
//////////////////////

$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);

try {
    $ig->login($username, $password);
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
    exit(0);
}

// NOTE: You must have a minimum of 2 options with a maximum of 4 options.
$options = [
    [
        'text'  => 'Option 1', // Name of the option
        'count' => 0, // DO NOT CHANGE.
    ],
    [
        'text'  => 'Correct Answer', // Name of the option
        'count' => 0, // DO NOT CHANGE.
    ],
    [
        'text'  => 'Option 3', // Name of the option
        'count' => 0, // DO NOT CHANGE.
    ],
    [
        'text'  => 'Option 4', // Name of the option
        'count' => 0, // DO NOT CHANGE.
    ],
];

// Now create the metadata array:
$metadata = [
    'story_quizs' => [
        // Note that you can only do one story poll in this array.
        [
            'x'                      => 0.5, // Range: 0.0 - 1.0. Note that x = 0.5 and y = 0.5 is center of screen.
            'y'                      => 0.5, // Also note that X/Y is setting the position of the CENTER of the clickable area
            'z'                      => 0, // DO NOT CHANGE
            'width'                  => 0.6805556, // Clickable area size, as percentage of image size: 0.0 - 1.0
            'height'                 => 0.4620959, // ...
            'rotation'               => 0.0,
            'question'               => 'GUESS MY FAVORITE ...', // Story quiz question. Should be all caps to emulate app.
            'options'                => $options, // Story quiz options array from earlier.
            'correct_answer'         => 1, // The correct option from the options array above. (First option is 0, second is 1, etc..).
            'viewer_can_answer'      => false, // DO NOT CHANGE.
            'viewer_answer'          => -1, // DO NOT CHANGE.
            'text_color'             => '#ffffff',
            'start_background_color' => '#ca2ee1',
            'end_background_color'   => '#5eb1ff',
            'is_sticker'             => true, // DO NOT CHANGE.
        ],
    ],
];

try {
    // This example will upload the image via our automatic photo processing
    // class. It will ensure that the story file matches the ~9:16 (portrait)
    // aspect ratio needed by Instagram stories. You have nothing to worry
    // about, since the class uses temporary files if the input needs
    // processing, and it never overwrites your original file.
    //
    // Also note that it has lots of options, so read its class documentation!
    $photo = new \InstagramAPI\Media\Photo\InstagramPhoto($photoFilename, ['targetFeed' => \InstagramAPI\Constants::FEED_STORY]);
    $ig->story->uploadPhoto($photo->getFile(), $metadata);

    // NOTE: Providing metadata for story uploads is OPTIONAL. If you just want
    // to upload it without any tags/location/caption, simply do the following:
    // $ig->story->uploadPhoto($photo->getFile());
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
}
