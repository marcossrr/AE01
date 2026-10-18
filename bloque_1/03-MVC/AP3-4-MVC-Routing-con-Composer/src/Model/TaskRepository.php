<?php

namespace AP34\Model;

use AP34\Core\Database;

class TaskRepository
{
    public function findAll()
    {
        $db = Database::getInstance();
        return $db->executeSQL("SELECT * FROM task");
    }

    public function findBySlug($slug)
    {
        $db = Database::getInstance();
        $task = $db->executeSQL("SELECT * FROM task WHERE slug = '$slug'");
        return array_shift($task);
    }

    public function save($title, $description)
    {
        $db = Database::getInstance();
        $slug = strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $title), '-'));
        $db->executeSQLnoreturn(
            "INSERT INTO task (title, slug, description, created_at, due_date)
             VALUES ('$title', '$slug', '$description', CURDATE(), DATE_ADD(CURDATE(), INTERVAL 7 DAY))"
        );
    }

    public function deleteById($id)
    {
        $db = Database::getInstance();
        $id = (int) $id;
        $db->executeSQLnoreturn("DELETE FROM task WHERE id = $id");
    }
}
