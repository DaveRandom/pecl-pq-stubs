<?php

namespace pq;

use pq\Exception\InvalidArgumentException;
use pq\Exception\BadMethodCallException;
use pq\Exception\RuntimeException;
use pq\Exception\DomainException;

/**
 * Class Connection
 *
 * @package pq
 * @property-read int $status A transaction status constant value
 * @property-read int $transactionStatus A connection status constant value
 * @property-read resource $socket The server socket resource
 * @property-read bool $busy Whether the connection is busy with asynchronous operations
 * @property-read string $errorMessage Any error message on failure
 * @property-read array $eventHandlers List of registered event handlers
 * @property-read string $db The database name of the connection
 * @property-read string $user The user name of the connection
 * @property-read string $pass The password of the connection
 * @property-read string $host The server host name of the connection
 * @property-read string $options The command-line options passed in the connection request
 * @method Cursor declare() declare(string $name, int $flags, string $query) Declare a cursor for a query
 */
class Connection
{
    /**
     * Connection Flags
     */
    const PERSISTENT = 1;
    const ASYNC = 2;

    /**
     * Connection Status
     */
    const OK = 1;
    const BAD = 2;
    const STARTED = 3;
    const MADE = 4;
    const AWAITING_RESPONSE = 5;
    const AUTH_OK = 6;
    const SSL_STARTUP = 7;
    const SETENV = 8;

    /**
     * Transaction Status
     */
    const TRANS_IDLE = 1;
    const TRANS_ACTIVE = 2;
    const TRANS_INTRANS = 3;
    const TRANS_INERROR = 4;
    const TRANS_UNKNOWN = 5;

    /**
     * Polling Status
     */
    const POLLING_FAILED  = 1;
    const POLLING_READING = 2;
    const POLLING_WRITING = 3;
    const POLLING_OK = 4;

    /**
     * Event Listener Types
     */
    const EVENT_NOTICE = 'notice';
    const EVENT_RESULT = 'result';
    const EVENT_RESET = 'reset';

    /**
     * Connection character set
     *
     * @var string
     */
    public $encoding;

    /**
     * Whether to fetch asynchronous results in unbuffered mode, i.e. each row generates a distinct Result instance
     *
     * @var bool
     */
    public $unbuffered;

    /**
     * Default fetch type for future Result instances
     *
     * @var int
     */
    public $defaultFetchType = Result::FETCH_ARRAY;

    /**
     * Default conversion bit mask for future Result instances
     *
     * @var int
     */
    public $defaultAutoConvert = Result::CONV_ALL;

    /**
     * Default transaction isolation level for future Transaction instances
     *
     * @var int
     */
    public $defaultTransactionIsolation = Transaction::READ_COMMITTED;

    /**
     * Default transaction read-only state for future Transaction instances
     *
     * @var bool
     */
    public $defaultTransactionReadonly = false;

    /**
     * Default transaction deferrable state for future Transaction instances
     *
     * @var bool
     */
    public $defaultTransactionDeferrable = false;

    /**
     * Create a new PostgreSQL connection
     *
     * @param string $dsn A connection string as described in the PostgreSQL documentation
     * @param int $flags Bit mask of connection flag constants
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function __construct($dsn = '', $flags = 0) {}

    /**
     * Asynchronously declare a cursor for a query
     *
     * @param string $name The identifying name of the cursor
     * @param int $flags Any combination of pq\Cursor constants
     * @param string $query The query for which to open a cursor
     * @return Cursor
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function declareAsync($name, $flags, $query) {}

    /**
     * Escape binary data for use within a query with the type bytea
     *
     * @param string $binary The binary data to escape
     * @return string|false
     * @throws BadMethodCallException
     */
    public function escapeBytea($binary) {}

    /**
     * Execute one or multiple SQL queries on the connection.
     *
     * @param string $query The queries to send to the server, separated by semi-colon
     * @return Result
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     * @throws DomainException
     */
    public function exec($query) {}

    /**
     * Execute one or multiple SQL queries on the connection.
     *
     * @param string $query The queries to send to the server, separated by semi-colon
     * @param callable $callback The callback to execute when the query finishes, receives a Result instance as the first argument
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function execAsync($query, callable $callback = null) {}

    /**
     * Execute an SQL query with properly escaped parameters substituted
     *
     * @param string $query The query to execute
     * @param array $params The parameter list to substitute
     * @param array $types Corresponding list of type OIDs for the parameters
     * @return Result
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function execParams($query, array $params, array $types = NULL) {}

    /**
     * Asynchronously execute an SQL query with properly escaped parameters substituted
     *
     * @param string $query The query to execute
     * @param array $params The parameter list to substitute
     * @param array $types Corresponding list of type OIDs for the parameters
     * @return Result
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function execParamsAsync($query, array $params, array $types = NULL) {}

    /**
     * Fetch the result of an asynchronous query
     *
     * @return Result|null
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     */
    public function getResult() {}

    /**
     * Listen on $channel for notifications
     *
     * @param string $channel The channel to listen on
     * @param callable $listener A callback automatically called whenever a notification on $channel arrives
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function listen($channel, callable $listener) {}

    /**
     * Listen on $channel for notifications
     *
     * @param string $channel The channel to listen on
     * @param callable $listener A callback automatically called whenever a notification on $channel arrives
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function listenAsync($channel, callable $listener) {}

    /**
     * Notify all listeners on $channel with $message
     *
     * @param string $channel The channel to notify
     * @param string $message The message to send
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function notify($channel, $message) {}

    /**
     * Asynchronously start notifying all listeners on $channel with $message
     *
     * @param string $channel The channel to notify
     * @param string $message The message to send
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function notifyAsync($channel, $message) {}

    /**
     * Stops listening for an event type
     *
     * @param string $event Any pq\Connection::EVENT_*
     * @return bool
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     */
    public function off($event) {}

    /**
     * Listen for an event
     *
     * @param string $event Any pq\Connection::EVENT_*
     * @param callable $callback The callback to invoke on event
     * @return int
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     */
    public function on($event, callable $callback) {}

    /**
     * Poll an asynchronously operating connection
     *
     * @return int
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function poll() {}

    /**
     * Prepare a named statement for later execution with Statement::execute()
     *
     * @param string $name The identifying name of the prepared statement
     * @param string $query The query to prepare
     * @param array $types An array of type OIDs for the substitution parameters
     * @return Statement
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function prepare($name, $query, array $types = null) {}

    /**
     * Asynchronously prepare a named statement for later execution with Statement::exec()
     *
     * @param string $name The identifying name of the prepared statement
     * @param string $query The query to prepare
     * @param array $types An array of type OIDs for the substitution parameters
     * @return Statement
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function prepareAsync($name, $query, array $types = null) {}

    /**
     * Quote a string for safe use in a query
     *
     * @param string $payload The payload to quote for use in a query
     * @return string|false
     * @throws BadMethodCallException
     */
    public function quote($payload) {}

    /**
     * Quote a string for safe use in a query
     *
     * @param string $name The name to quote
     * @return string|false
     * @throws BadMethodCallException
     */
    public function quoteName($name) {}

    /**
     * Attempt to reset a possibly broken connection to a working state
     *
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function reset() {}

    /**
     * Asynchronously reset a possibly broken connection to a working state
     *
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function resetAsync() {}

    /**
     * Set a data type converter
     *
     * @param Converter $converter An object implementing the Converter interface
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     */
    public function setConverter(Converter $converter) {}

    /**
     * Begin a transaction
     *
     * @param int $isolation Any Transaction isolation level constant
     * @param bool $readonly Whether the transaction executes only reads
     * @param bool $deferrable Whether the transaction is deferrable
     * @return Transaction
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function startTransaction($isolation = Transaction::READ_COMMITTED, $readonly = false, $deferrable = false) {}

    /**
     * Asynchronously begin a transaction
     *
     * @param int $isolation Any Transaction isolation level constant
     * @param bool $readonly Whether the transaction executes only reads
     * @param bool $deferrable Whether the transaction is deferrable
     * @return Transaction
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function startTransactionAsync($isolation = Transaction::READ_COMMITTED, $readonly = false, $deferrable = false) {}

    /**
     * Trace protocol communication with the server
     *
     * @param resource $stream
     * @return bool
     * @throws BadMethodCallException
     */
    public function trace($stream) {}

    /**
     * Unescape bytea data retrieved from the server
     *
     * @param string $bytea Bytea data retrieved from the server
     * @return string|false
     * @throws BadMethodCallException
     */
    public function unescapeBytea($bytea) {}

    /**
     * Stop listening for notifications on channel $channel
     *
     * @param string $channel
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function unlisten($channel) {}

    /**
     * Asynchronously stop listening for notifications on channel $channel
     *
     * @param string $channel
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function unlistenAsync($channel) {}

    /**
     * Stop applying a data type converter
     *
     * @param Converter $converter A converter previously set with Connection::setConverter()
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     */
    public function unsetConverter(Converter $converter) {}
}
