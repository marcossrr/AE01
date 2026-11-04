<?php

namespace AP41\Repository;

use AP41\Entity\Task;
use Doctrine\ORM\EntityRepository;

class TaskRepository extends EntityRepository
{
    public function findActive(): array
    {
        return $this->findBy(['status' => true], ['name' => 'ASC']);
    }

}