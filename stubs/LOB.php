<?php

namespace pq;

use pq\Exception\InvalidArgumentException;
use pq\Exception\BadMethodCallException;
use pq\Exception\RuntimeException;

/**
 * Class LOB
 *
 * @package pq
 * @property-read Transaction $transaction The transaction wrapping the operations on the large object
 * @property-read int $oid The OID of the large object
 * @property-read resource $stream The stream connected to the large object
 */
class LOB
{
    const INVALID_OID = 0;
    const R = 1;
    const W = 2;
    const RW = 3;

    /**
     * Open or create a large object
     *
     * @param Transaction $txn The transaction which wraps the large object operations
     * @param int $oid The OID of the existing large object to open
     * @param int $mode Access mode (read, write or read/write)
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function __construct(Transaction $txn, $oid = LOB::INVALID_OID, $mode = LOB::RW) {}

    /**
     * Read a string of data from the current position of the large object
     *
     * @param int $length The amount of bytes to read from the large object
     * @param int $read The amount of bytes actually read from the large object
     * @return string
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function read($length = 0x1000, &$read = null) {}

    /**
     * Seek to a position within the large object
     *
     * @param int $offset The position to seek to
     * @param int $whence From where to seek (SEEK_SET, SEEK_CUR or SEEK_END)
     * @return int
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function seek($offset, $whence = \SEEK_SET) {}

    /**
     * Retrieve the current position within the large object
     *
     * @return int
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function tell() {}

    /**
     * Truncate the large object
     *
     * @param int $length The length to truncate to
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function truncate($length = 0) {}

    /**
     * Write data to the large object
     *
     * @param string $data The data that should be written to the current position
     * @return int
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function write($data) {}
}
