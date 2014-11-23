<?php

namespace pq;

use pq\Exception\InvalidArgumentException;
use pq\Exception\BadMethodCallException;
use pq\Exception\RuntimeException;

/**
 * Class COPY
 *
 * @package pq
 * @property-read Connection $connection The connection to the PostgreSQL server
 * @property-read string $expression The expression of the COPY statement used to start the operation
 * @property-read int $direction The direction of the COPY operation (COPY::FROM_STDIN or COPY::TO_STDOUT)
 * @property-read string $options Any additional options used to start the COPY operation
 */
class COPY
{
    const FROM_STDIN = 1;
    const TO_STDOUT = 2;

    /**
     * Start a COPY operation
     *
     * @param Connection $conn The connection to use for the COPY operation
     * @param string $expression The expression generating the data to copy
     * @param int $direction Data direction (COPY::FROM_STDIN or COPY::TO_STDOUT)
     * @param string $options Any COPY options
     * @see http://www.postgresql.org/docs/current/static/sql-copy.html
     */
    public function __construct(Connection $conn, $expression, $direction, $options = null) {}

    /**
     * End the COPY operation to the server during Result::COPY_IN state
     *
     * @param string $error If set, the COPY operation will abort with provided message
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function end($error = null) {}

    /**
     * Receive data from the server during Result::COPY_OUT state
     *
     * @param string $data Data read from the server
     * @return bool
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function get(&$data = null) {}

    /**
     * Send data to the server during Result::COPY_IN state
     *
     * @param string $data Data to send to the server
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function put($data) {}
}
