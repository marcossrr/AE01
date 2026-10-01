<?php

declare(strict_types=1);

class DatabaseConnection
{

    private static $instance = null;

    private function __construct()
    {

        $host = 'mariadb';
        $username = 'root';
        $password = 'root';
        $database = 'user_operations';

        $connection = new mysqli($host, $username, $password, $database);

        if ($connection->connect_error) {
            die('<br>Error de conexión: ' . $connection->connect_error . '<br>');
        }
        echo '<br>Conexión exitosa. <br>';

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $connection->set_charset('utf8mb4');

        $sql = 'SELECT id, name, active FROM users';
        $result = $connection->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo '<br> ID: ' . $row['id'] . '<br>';
            echo 'Nombre: ' . $row['name'] . '<br>';
            echo '--------------------------<br>';
        }

    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function clone()
    {
    }

    public function query($sql)
    {
        return $this->connection = new mysqli($host, $username, $password, $database);
    }

}

$connection1 = DatabaseConnection::getInstance();
$connection2 = DatabaseConnection::getInstance();

if ($connection1 === $connection2) {
    echo "<br> Las conexiones estan en la misma instancia <br>";
} else {
    echo "<br> Las conexiones no estan en la misma instancia <br>";
}

?>