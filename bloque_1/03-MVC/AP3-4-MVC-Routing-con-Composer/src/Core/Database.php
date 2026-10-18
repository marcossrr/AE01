<?php

namespace AP34\Core;

use AP34\Core\Interfaces\DatabaseInterface;

/**
 * Conexión a la BB.DD. con patrón Singleton.
 */
class Database implements DatabaseInterface
{
    private static $dbConfig;
    private static $instance = null;
    private static $connection;

    private function __construct()
    {
        $configPath = __DIR__ . '/../../config/dbConfig.json';
        if (!file_exists($configPath)) {
            die('No se encuentra el archivo de configuración de la base de datos.');
        }
        self::$dbConfig = json_decode(file_get_contents($configPath), true);
        if (!self::$dbConfig) {
            die('Error al leer el archivo de configuración de la base de datos.');
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
        $host = self::$dbConfig["host"];
        $username = self::$dbConfig["user"];
        $password = self::$dbConfig["password"];
        $database = self::$dbConfig["database"];

        self::$connection = new \mysqli($host, $username, $password, $database);
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
