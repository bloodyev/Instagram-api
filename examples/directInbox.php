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
    // Get Direct Inbox with Limit = 20. That limit is set by Instagram and tells the server
    // how many threads to return.
    $threads = $ig->direct->getInbox(null, 20)->getInbox()->getThreads();

    // In this example we will be iterating each thread to load all the items of each.
    foreach ($threads as $thread) {
        $oldestCursor = null;
        $previous = null;

        do {
            $previous = $oldestCursor;
            // Oldest cursor is used to paginate. In the first iteration $oldestCursor is null, next
            // iteration it will take the oldest cursor from the response.
            $threadInbox = $ig->direct->getThread($thread->getThreadId(), $oldestCursor)->getThread();
            $oldestCursor = $thread->getOldestCursor();
            // Get the items from the thread
            $threadItems = $threadInbox->getItems();

            foreach ($threadItems as $threadItem) {
                // As an example we are only echoing some values of each item.
                echo 'Item ID: '.$threadItem->getItemId()."\n";
                echo 'Item Type: '.$threadItem->getItemType()."\n\n";
            }
            // We will stop the do-while loop when oldesct cursor is null or is the same as the previous one.
        } while ($oldestCursor !== null && $previous !== $oldestCursor);
    }
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
}
