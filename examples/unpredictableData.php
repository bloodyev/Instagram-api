<?php

set_time_limit(0);
date_default_timezone_set('UTC');

require __DIR__.'/../vendor/autoload.php';

/////// CONFIG ///////
$username = '';
$password = '';
$debug = true;
$truncatedDebug = false;
//////////////////////

$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);

try {
    $ig->login($username, $password);
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
    exit(0);
}

try {
    // We will get all items from our own feed.
    $feedItems = $ig->timeline->getSelfUserFeed()->getItems();

    $mediaIds = [];
    foreach ($feedItems as $feedItem) {
        // We are iterating each item to get its media_id.
        $mediaIds[] = $feedItem->getId();
    }

    // The followinf request contains a field in its response 'comment_infos' that contains
    // Unpredictable keys like:
    //
    // 'media_id' => CommentInfo Object
    //
    // Since we don't know each key, we use Unpredictable containers. All Unpredictable models are
    // defined in /Response/Model/UnpredictableKeys. To obtain the content data as an array we use the
    // function getData() defined in CoreUnpredictableContainer.
    $commentInfos = $ig->media->getCommentInfos($mediaIds)->getCommentInfos()->getData();

    foreach ($commentInfos as $key => $value) {
        echo "Media ID: {$key}";
        echo "Comment count: {$value->getCommentCount()}\n\n";
    }
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
}
