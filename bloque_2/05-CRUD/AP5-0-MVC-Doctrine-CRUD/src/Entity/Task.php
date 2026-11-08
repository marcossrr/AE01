<?php

namespace AP50\Entity;

use AP50\Repository\TaskRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: TaskRepository::class)]
#[Table(name: 'task')]
class Task
{
    #[Id]
    #[GeneratedValue]
    #[Column(name: 'id', type: 'integer', nullable: true)]
    private ?int $id = null;

    #[Column(name: 'title', type: 'string', length: 255)]
    private string $title;

    #[Column(name: 'slug', type: 'string', length: 255, nullable: true)]
    private ?string $slug = null;

    #[Column(name: 'description', type: Types::TEXT, length: 65535)]
    private string $description;

    #[Column(name: 'created_at', type: 'date')]
    private DateTime $creationDate;

    #[Column(name: 'due_date', type: 'date')]
    private DateTime $dueDate;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return DateTime
     */
    public function getCreationDate(): DateTime
    {
        return $this->creationDate;
    }

    /**
     * @param DateTime $creationDate
     */
    public function setCreationDate(DateTime $creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return DateTime
     */
    public function getDueDate(): DateTime
    {
        return $this->dueDate;
    }

    /**
     * @param DateTime $dueDate
     */
    public function setDueDate(DateTime $dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }
}