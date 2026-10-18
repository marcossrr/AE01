<?php

namespace AP34\Core\Interfaces;

interface DatabaseInterface
{
    public function executeSQL($sql);

    public function executeSQLnoreturn($sql);
}
