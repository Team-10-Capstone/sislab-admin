<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
    /**
     * The directory that holds the Migrations
     * and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to
     * use if no other is specified.
     */
    public string $defaultGroup = 'default';

    // /**
    //  * The default database connection.
    //  */
    // public array $default = [
    //     'DSN' => '',
    //     'hostname' => 'sislab.database.windows.net',
    //     'username' => 'fahri',
    //     'password' => 'Wates123',
    //     'database' => 'sislab',
    //     'DBDriver' => 'SQLSRV',
    //     'DBPrefix' => '',
    //     'pConnect' => false,
    //     'DBDebug' => true,
    //     'charset' => 'utf16',
    //     'DBCollat' => 'utf8_general_ci',
    //     'swapPre' => '',
    //     'encrypt' => false,
    //     'compress' => false,
    //     'strictOn' => false,
    //     'failover' => [],
    //     'port' => 1433,
    // ];


    // /**
    //  * Database karimutu
    //  * used to query data from karimutu system
    //  */
    // public array $karimutu = [
    //     'DSN' => '',
    //     'hostname' => 'sislab.database.windows.net',
    //     'username' => 'fahri',
    //     'password' => 'Wates123',
    //     'database' => 'karimutu',
    //     'DBDriver' => 'SQLSRV',
    //     'DBPrefix' => '',
    //     'pConnect' => false,
    //     'DBDebug' => true,
    //     'charset' => 'utf16',
    //     'DBCollat' => 'utf8_general_ci',
    //     'swapPre' => '',
    //     'encrypt' => false,
    //     'compress' => false,
    //     'strictOn' => false,
    //     'failover' => [],
    //     'port' => 1433,
    //     // Change this to the appropriate port
    // ];

    public array $default = [
        'DSN' => '',
        'hostname' => 'localhost',
        'username' => 'sa',
        'password' => '123',
        'database' => 'sislab',
        'DBDriver' => 'SQLSRV',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug' => true,
        'charset' => 'utf16',
        'DBCollat' => 'utf8_general_ci',
        'swapPre' => '',
        'encrypt' => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port' => 1433,
    ];


    /**
     * Database karimutu
     * used to query data from karimutu system
     */
    public array $karimutu = [
        'DSN' => '',
        'hostname' => 'localhost',
        'username' => 'sa',
        'password' => '123',
        'database' => 'karimutu_2',
        'DBDriver' => 'SQLSRV',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug' => true,
        'charset' => 'utf16',
        'DBCollat' => 'utf8_general_ci',
        'swapPre' => '',
        'encrypt' => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port' => 1433,
        // Change this to the appropriate port
    ];

    /**
     * This database connection is used when
     * running PHPUnit database tests.
     */
    public array $tests = [
        'DSN' => '',
        'hostname' => 'localhost',
        'username' => 'sa',
        'password' => '123',
        'database' => 'sislab_test',
        'DBDriver' => 'SQLSRV',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug' => true,
        'charset' => 'utf16',
        'DBCollat' => 'utf8_general_ci',
        'swapPre' => '',
        'encrypt' => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port' => 1433,
    ];

    public function __construct()
    {
        parent::__construct();

        // Ensure that we always set the database group to 'tests' if
        // we are currently running an automated test suite, so that
        // we don't overwrite live data on accident.
        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}