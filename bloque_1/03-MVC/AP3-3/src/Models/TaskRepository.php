<?php

namespace AP33\Models;

use AP33\Core\Database;

class TaskRepository {
    public static function getAll() {
        $db = Database::getInstance();
        $query = "SELECT id, title, due_date FROM task";
        return $db->executeSQL($query);
    }

    public static function getById($id) {
        $db = Database::getInstance();
        $id = intval($id);
        $query = "SELECT * FROM task WHERE id = $id";
        $results = $db->executeSQL($query);

        return !empty($results) ? $results[0] : null;
    }
}
