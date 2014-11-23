<?php

namespace pq;

class DateTime extends \DateTime implements \JsonSerializable
{
    /**
     * The default format of any date/time type automatically converted by Result (depends on the actual type of the column)
     *
     * @var string
     */
    public $format = 'Y-m-d H:i:s.uO';

    /**
     * Stringify the DateTime instance according to DateTime::$format
     *
     * @return string
     */
    public function __toString() {}

    /**
     * Serialize to JSON
     *
     * @return string
     */
    public function jsonSerialize() {}
}
