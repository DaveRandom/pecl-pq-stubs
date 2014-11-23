<?php

namespace pq;

use pq\Exception\InvalidArgumentException;
use pq\Exception\BadMethodCallException;
use pq\Exception\RuntimeException;

/**
 * Class Cancel
 *
 * @package pq
 * @property-read Connection $connection The connection to cancel the query on
 */
class Cancel
{
    /**
     * Create a new cancellation request for an asynchronous query
     *
     * @param Connection $conn The connection to request cancellation on
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function __construct(Connection $conn) {}

    /**
     * Perform the cancellation request
     *
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function cancel() {}
}
