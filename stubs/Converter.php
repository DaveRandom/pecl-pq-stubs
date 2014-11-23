<?php

namespace pq;

/**
 * Interface Converter
 *
 * @package pq
 */
interface Converter
{
    /**
     * Convert a string received from the PostgreSQL server back to a PHP type
     *
     * @param string $data String data received from the server
     * @param int $type The type OID of the data, irrelevant for single-type converters
     * @return mixed the value converted to a PHP type
     */
    public function convertFromString($data, $type);

    /**
     * Convert a value to a string for use in a query
     *
     * @param mixed $value The PHP value which should be converted to a string
     * @param int $type The type OID the converter should handle. Irrelevant for singly-type converters
     * @return string a textual representation of the value accepted by the PostgreSQL server
     */
    public function convertToString($value, $type);

    /**
     * Announce which types the implementing converter can handle
     *
     * @return int[] OIDs of handled types
     */
    public function convertTypes();
}