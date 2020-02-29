<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * DiscoverChainingFeedResponse.
 *
 * @method bool getAutoLoadMoreEnabled()
 * @method int getChainLength()
 * @method Model\FeedItem[] getItems()
 * @method mixed getMessage()
 * @method bool getMoreAvailable()
 * @method string getNextMaxId()
 * @method int getNumResults()
 * @method string getStatus()
 * @method Model\_Message[] get_Messages()
 * @method bool isAutoLoadMoreEnabled()
 * @method bool isChainLength()
 * @method bool isItems()
 * @method bool isMessage()
 * @method bool isMoreAvailable()
 * @method bool isNextMaxId()
 * @method bool isNumResults()
 * @method bool isStatus()
 * @method bool is_Messages()
 * @method $this setAutoLoadMoreEnabled(bool $value)
 * @method $this setChainLength(int $value)
 * @method $this setItems(Model\FeedItem[] $value)
 * @method $this setMessage(mixed $value)
 * @method $this setMoreAvailable(bool $value)
 * @method $this setNextMaxId(string $value)
 * @method $this setNumResults(int $value)
 * @method $this setStatus(string $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetAutoLoadMoreEnabled()
 * @method $this unsetChainLength()
 * @method $this unsetItems()
 * @method $this unsetMessage()
 * @method $this unsetMoreAvailable()
 * @method $this unsetNextMaxId()
 * @method $this unsetNumResults()
 * @method $this unsetStatus()
 * @method $this unset_Messages()
 */
class DiscoverChainingFeedResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'auto_load_more_enabled'             => 'bool',
        'more_available'                     => 'bool',
        'next_max_id'                        => 'string',
        'items'                              => 'Model\FeedItem[]',
        'num_results'                        => 'int',
        'chain_length'                       => 'int',
    ];
}
