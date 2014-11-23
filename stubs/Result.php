<?php

namespace pq;

use pq\Exception\InvalidArgumentException;
use pq\Exception\BadMethodCallException;
use pq\Exception\RuntimeException;

/**
 * Class Result
 *
 * @package pq
 * @property-read int $status A status constant.
 * @property-read string $statusMessage The accompanying status message.
 * @property-read string $errorMessage Any error message if $status indicates an error.
 * @property-read int $numRows The number of rows in the result set.
 * @property-read int $numCols The number of fields in a single tuple of the result set.
 * @property-read int $affectedRows The number of rows affected by a statement.
 */
class Result
{
    const EMPTY_QUERY = 0;
    const COMMAND_OK = 1;
    const TUPLES_OK = 2;
    const SINGLE_TUPLE = 3;
    const COPY_OUT = 4;
    const COPY_IN = 5;
    const BAD_RESPONSE = 6;
    const NONFATAL_ERROR = 7;
    const FATAL_ERROR = 8;

    const FETCH_ARRAY = 1;
    const FETCH_ASSOC = 2;
    const FETCH_OBJECT = 3;

    const CONV_BOOL = 1;
    const CONV_INT = 2;
    const CONV_FLOAT = 3;
    const CONV_SCALAR = 4;
    const CONV_ARRAY = 5;
    const CONV_DATETIME = 6;
    const CONV_JSON = 7;
    const CONV_ALL = 8;

    /**
     * The type of return value the fetch methods should return when no fetch type argument was given. Defaults to Connection::$defaultFetchType
     *
     * @var int
     */
    public $fetchType = self::FETCH_ARRAY;

    /**
     * What type of conversions to perform automatically
     *
     * @var int
     */
    public $autoConvert = self::CONV_ALL;

    /**
     * Bind a variable to a result column
     *
     * @param mixed $col The column name or index to bind to
     * @param mixed $var The variable reference
     * @return bool
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     */
    public function bind($col, &$var = null) {}

    /**
     * Count number of rows in this result set
     *
     * @return int
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     */
    public function count() {}

    /**
     * Describe a prepared statement
     *
     * @return int[]
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     */
    public function desc() {}

    /**
     * Fetch all rows at once
     *
     * @param int $fetchType The type the return value should have, see Result::FETCH_* constants
     * @return array
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     */
    public function fetchAll($fetchType = null) {}

    /**
     * Fetch all rows of a single column
     *
     * @param int $col The column name or index to fetch
     * @return array
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function fetchAllCols($col = 0) {}

    /**
     * Iteratively fetch a row into bound variables
     *
     * @return array|null
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function fetchBound() {}

    /**
     * Iteratively fetch a single column
     *
     * @param mixed $ref The variable where the column value will be stored in
     * @param int|string $col The column name or index
     * @return bool|null
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function fetchCol(&$ref = null, $col = 0) {}

    /**
     * Iteratively fetch a row
     *
     * @param int $fetchType The type the return value should have, see Result::FETCH_* constants
     * @return array|\stdClass|null
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function fetchRow($fetchType = null) {}

    /**
     * Fetch the complete result set as a simple map, a multi dimensional array, each dimension indexed by a column
     *
     * @param int|int[]|string[] $keys The the column indices/names used to index the map
     * @param int $vals The column indices/names which should build up the leaf entry of the map
     * @return array
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function map($keys = 0, $vals = null) {}
}
