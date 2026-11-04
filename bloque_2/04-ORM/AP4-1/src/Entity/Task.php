<?php
namespace AP41\Entity;

use AP41\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
#[ORM\Table(name: 'task')]
class Task {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id')]
    private int $id;
    #[ORM\Column(name: 'title', length: 255)]
    private string $title;
    #[ORM\Column(name: 'description', length: 255)]
    private string $description;

    #[ORM\Column(name: 'slug', length: 255)]
    private string $slug;

    #[ORM\Column(name: 'created_at')]
    private \DateTime $created_at;

    #[ORM\Column(name: 'due_date')]
    private \DateTime $due_date;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string{
        return $this->title;
    }

    public function setTitle(string $title): void{
        $this->title = $title;
    }

    public function getDescription():string {
        return $this->description;
    }

    public function setDescription(string $description): void{
        $this->description = $description;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getDueDate(): \DateTime
    {
        return $this->due_date;
    }

    public function setDueDate(date $due_date): void
    {
        $this->due_date = $due_date;
    }


}
