<?php

declare(strict_types=1);
class DatabaseConnection {
    private static $instancia = null;

    $host = 'mariadb';
    $username = 'root';
    $password = 'root';
    $database = 'user_operations';

    private function __construct(){}

    public static function getInstance(){
        if (self::$instance === null){
            self::$instancia = new DatabaseConnection();
        }
            return self::$instance;
    }
}
