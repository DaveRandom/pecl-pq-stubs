<?php

namespace pq;

use pq\Exception\InvalidArgumentException;
use pq\Exception\BadMethodCallException;
use pq\Exception\RuntimeException;
use pq\Exception\DomainException;

/**
 * Class Transaction
 *
 * @package pq
 * @property-read Connection $connection The connection the transaction was started on
 */
class Transaction
{
    /**
     * Transaction isolation level where only rows committed before the transaction began can be seen
     */
    const READ_COMMITTED = 1;

    /**
     * Transaction isolation level where only rows committed before the first query was executed in this transaction
     */
    const REPEATABLE_READ = 2;

    /**
     * Transaction isolation level that guarantees serializable repeatability which might lead to serialization_failure on high concurrency
     */
    const SERIALIZABLE = 3;

    /**
     * The transaction isolation level
     *
     * @var int
     */
    public $isolation = self::READ_COMMITTED;

    /**
     * Whether this transaction performs read only queries
     *
     * @var bool
     */
    public $readonly = false;

    /**
     * Whether the transaction is deferrable
     *
     * @var bool
     */
    public $deferrable = false;

    /**
     * Start a transaction
     *
     * @param Connection $conn The connection to start the transaction on
     * @param bool $async Whether to start the transaction asynchronously
     * @param int $isolation The transaction isolation level (defaults to Connection::$defaultTransactionIsolation)
     * @param bool $readonly Whether the transaction is readonly (defaults to Connection::$defaultTransactionReadonly)
     * @param bool $deferrable Whether the transaction is deferrable (defaults to Connection::$defaultTransactionDeferrable)
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function __construct(Connection $conn, $async = false, $isolation = self::READ_COMMITTED, $readonly = false, $deferrable = false) {}

    /**
     * Commit the transaction or release the previous savepoint
     *
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     * @throws DomainException
     */
    public function commit() {}

    /**
     * Asynchronously commit the transaction or release the previous savepoint
     *
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function commitAsync() {}

    /**
     * Create a new large object and open it
     *
     * @param int $mode How to open the large object (read, write or both; see LOB constants)
     * @return LOB
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function createLOB($mode = LOB::RW) {}

    /**
     * Export a large object to a local file
     *
     * @param int $oid The OID of the large object
     * @param string $path The path of a local file to export to
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function exportLOB($oid, $path) {}

    /**
     * Export a snapshot for transaction synchronization
     *
     * @return string
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     * @throws DomainException
     */
    public function exportSnapshot() {}

    /**
     * Asynchronously export a snapshot for transaction synchronization
     *
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function exportSnapshotAsync() {}

    /**
     * Import a local file into a large object
     *
     * @param string $localPath A path to a local file to import
     * @param int $oid The target OID, a new large object will be created if INVALID_OID
     * @return int
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function importLOB($localPath, $oid = LOB::INVALID_OID) {}

    /**
     * Import a snapshot from another transaction to synchronize with
     *
     * @param string $snapshotID The snapshot identifier obtained by exporting a snapshot from a transaction
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     * @throws DomainException
     */
    public function importSnapshot($snapshotID) {}

    /**
     * Asynchronously import a snapshot from another transaction to synchronize with
     *
     * @param string $snapshotID The snapshot identifier obtained by exporting a snapshot from a transaction
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function importSnapshotAsync($snapshotID) {}

    /**
     * Open a large object
     *
     * @param int $oid The OID of the large object
     * @param int $mode Operational mode; read, write or both
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function openLOB($oid, $mode = LOB::RW) {}

    /**
     * Rollback the transaction or to the previous savepoint within this transaction
     *
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     * @throws DomainException
     */
    public function rollback() {}

    /**
     * Asynchronously rollback the transaction or to the previous savepoint within this transaction
     *
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function rollbackAsync() {}

    /**
     * Create a SAVEPOINT within this transaction
     *
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function savepoint() {}

    /**
     * Asynchronously create a SAVEPOINT within this transaction
     *
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function savepointAsync() {}
}
