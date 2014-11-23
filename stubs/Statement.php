<?php

namespace pq;

use pq\Exception\InvalidArgumentException;
use pq\Exception\BadMethodCallException;
use pq\Exception\RuntimeException;
use pq\Exception\DomainException;

/**
 * Class Statement
 *
 * @package pq
 * @property-read Connection $connection The connection to the server
 * @property-read string $name The identifying name of the prepared statement
 */
class Statement
{
    /**
     * Prepare a new statement
     *
     * @param Connection $conn The connection to prepare the statement on
     * @param string $name The name identifying this statement
     * @param string $query The actual query to prepare
     * @param int[] $types A list of corresponding query parameter type OIDs
     * @param bool $async Whether to prepare the statement asynchronously
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     * @throws DomainException
     */
    public function __construct(Connection $conn, $name, $query, array $types = null, $async = false) {}

    /**
     * Bind a variable to an input parameter
     *
     * @param int $paramNo The parameter index to bind to
     * @param mixed $paramRef The variable to bind
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     */
    public function bind($paramNo, &$paramRef = null) {}

    /**
     * Describe the parameters of the prepared statement
     *
     * @return int[]
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     * @throws DomainException
     */
    public function desc() {}

    /**
     * Asynchronously describe the parameters of the prepared statement
     *
     * @return int[]
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function descAsync() {}

    /**
     * Execute the prepared statement
     *
     * @param array $params Any parameters to substitute in the prepared statement (defaults to any bound variables)
     * @return Result
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function exec(array $params = null) {}

    /**
     * Asynchronously execute the prepared statement
     *
     * @param array $params Any parameters to substitute in the prepared statement (defaults to any bound variables)
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function execAsync(array $params = null) {}
}
