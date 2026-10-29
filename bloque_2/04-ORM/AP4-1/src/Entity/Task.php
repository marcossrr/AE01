<?php

use AP41\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'users')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'taskId')]
    private int $id;
    #[ORM\Column(name: 'taskTitle', length: 255)]
    private string $title;
    #[ORM\Column(name: 'taskDescription', length: 255)]
    private string $description;

    public function getId(): int
    {
        return $this->id;
    }
}
