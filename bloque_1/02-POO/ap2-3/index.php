<?php

declare(strict_types=1);

        $host = 'mariadb';
        $username = 'root';
        $password = 'root';
        $database = 'user_operations';


        if (self::$instance === null) {
        }
        return self::$instance;
    }
}

