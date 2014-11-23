<?php

namespace pq;

use pq\Exception\InvalidArgumentException;
use pq\Exception\BadMethodCallException;
use pq\Exception\RuntimeException;

/**
 * Class Cursor
 *
 * @package pq
 * @property-read Connection $connection The connection the cursor was declared on
 * @property-read string $name The identifying name of the cursor
 */
class Cursor
{
    const BINARY = 1;
    const INSENSITIVE = 2;
    const WITH_HOLD = 3;
    const SCROLL = 4;
    const NO_SCROLL = 5;

    /**
     * Declare a cursor
     *
     * @param Connection $connection The connection on which the cursor should be declared
     * @param int $flags Bit mask of Cursor constants
     * @param string $query The query for which the cursor should be opened
     * @param bool $async Whether to declare the cursor asynchronously
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function __construct(Connection $connection, $flags, $query, $async = false) {}

    /**
     * Close an open cursor
     *
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function close() {}

    /**
     * Fetch rows from the cursor
     *
     * @param string $spec What to fetch
     * @return Result
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     * @see http://www.postgresql.org/docs/current/static/sql-fetch.html
     */
    public function fetch($spec = '1') {}

    /**
     * Asynchronously fetch rows from the cursor
     *
     * @param string $spec What to fetch
     * @param callable $callback A callback to execute when the result is ready
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function fetchAsync($spec = '1', callable $callback = null) {}

    /**
     * Move the cursor
     *
     * @param string $spec Where to move the cursor to
     * @return Result
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function move($spec = '1') {}

    /**
     * Asynchronously move the cursor
     *
     * @param string $spec Where to move the cursor to
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function moveAsync($spec = '1') {}

    /**
     * Reopen a cursor
     *
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function open() {}
}
