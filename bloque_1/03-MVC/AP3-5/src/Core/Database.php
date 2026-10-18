<?php

namespace AP35\Core;

use AP35\Core\Interfaces\DatabaseInterface;

/**
 * Conexión a la BB.DD. con patrón Singleton.
 */
class Database implements DatabaseInterface
{
    private static $DBHOST;
    private static $DBUSER;
    private static $DBPASSWORD;
    private static $DBNAME;
    private static $instance = null;
    private static $connection;

    private function __construct()
    {
        if(!isset($_ENV['DBHOST'])) {
            die("Añade la variable de entorno DBHOST");
        }
        $this->getConnection();
    }

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    private function getConnection(): void
    {
        $host = $_ENV['DBHOST'];
        $user = $_ENV['DBUSER'];
        $password = $_ENV['DBPASSWORD'];
        $database = $_ENV['DBNAME'];

        self::$connection = new \mysqli($host, $user, $password, $database);

    }

    private function __clone()
    {
    }

    public function __destruct()
    {
        if (self::$connection != null) {
            self::$connection->close();
        }
    }

    public function executeSQL($sql)
    {
        return self::$connection->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function executeSQLnoreturn($sql)
    {
        self::$connection->query($sql);
    }
}
