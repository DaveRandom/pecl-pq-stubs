<?php

namespace pq;

/**
 * Interface Exception
 *
 * @package pq
 */
interface Exception
{
    /**
     * An invalid argument was passed to a method (InvalidArgumentException)
     */
    const INVALID_ARGUMENT = 0;

    /**
     * A runtime exception occurred (RuntimeException)
     */
    const RUNTIME = 1;

    /**
     * The connection failed (RuntimeException)
     */
    const CONNECTION_FAILED = 2;

    /**
     * An input/output exception occurred (RuntimeException)
     */
    const IO = 3;

    /**
     * Escaping an argument or identifier failed internally (RuntimeException)
     */
    const ESCAPE = 4;

    /**
     * Calling this method was not expected yet (BadMethodCallException)
     */
    const BAD_METHODCALL = 5;

    /**
     * An object’s constructor was not called (BadMethodCallException)
     */
    const UNINITIALIZED = 6;

    /**
     * Implementation domain error (DomainException)
     */
    const DOMAIN = 7;

    /**
     * SQL syntax error (DomainException)
     */
    const SQL = 8;
}
