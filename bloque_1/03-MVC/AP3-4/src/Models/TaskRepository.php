<?php

namespace AP33\Models;

use AP33\Core\Database;

class TaskRepository {

    public static function getAll() {
        $db = Database::getInstance();
        $query = "SELECT id, title, due_date, slug FROM task";
        return $db->executeSQL($query);
    }

    public static function getBySlug($slug) {
        $db = Database::getInstance();
        $slug = addslashes($slug);
        $query = "SELECT * FROM task WHERE slug = '$slug'";
        $results = $db->executeSQL($query);

        return !empty($results) ? $results[0] : null;
    }

    public static function create($title, $description) {
        $db = Database::getInstance();

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title), '-'));

        $title = addslashes($title);
        $description = addslashes($description);
        $dueDate = date('Y-m-d');

        $query = "INSERT INTO task (title, description, slug, due_date) VALUES ('$title', '$description', '$slug', '$dueDate')";
    }

    public static function delete($id) {
        $db = Database::getInstance();
        $id = intval($id);
        $query = "DELETE FROM task WHERE id = $id";
    }
}
