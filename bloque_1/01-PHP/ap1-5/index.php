<?php

$host = 'mariadb';
$username = 'root';
$password = 'root';
$database = 'user_operations';

$connection = new mysqli($host, $username, $password, $database);

if ($connection->connect_error) {
    die('Error de conexión: ' . $connection->connect_error);
}
echo 'Conexión exitosa.';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connection->set_charset('utf8mb4');

$sql = 'SELECT id, name, active FROM users';
$result = $connection->query($sql);
while ($row = $result->fetch_assoc()) {
    echo 'ID: ' . $row['id'] . '<br>';
    echo 'Nombre: ' . $row['name'] . '<br>';
    echo '--------------------------<br>';
}

$name = 'Usuario de prueba';
$active = 0;
$sql = "INSERT INTO users (name, active) VALUES ('$name', $active)";
if ($connection->query($sql) === true) {
    echo 'Usuario insertado. Nueva id: ' . $connection->insert_id;
} else {
    echo 'Error al insertar: ' . $connection->error;
}

$id = 1;
$active = 1;
$sql = "UPDATE users SET active = $active WHERE id = $id";
if ($connection->query($sql) === true) {
    echo 'Usuario actualizado.<br>';
} else {
    echo 'Error al hacer UPDATE: ' . $connection->error;
}

$id = 1;
$sql = "DELETE FROM users WHERE id = $id";
if ($connection->query($sql) === true) {
    echo 'Usuario eliminado.<br>';
} else {
    echo 'Error al hacer DELETE: ' . $connection->error;
}

$connection_close();
