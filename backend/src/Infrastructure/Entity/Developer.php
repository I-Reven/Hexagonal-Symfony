<?php

namespace App\Infrastructure\Entity;

use App\Domain\Exception\InvalidArgumentException;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Developer
 * @package App\Infrastructure\Entity
 *
 * @ORM\Entity(repositoryClass="App\Infrastructure\Repository\DeveloperRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Developer
{
    use Timestamps;

    public function __construct()
    {
        $this->tasks = new ArrayCollection();
    }

    /**
     * @var int|null
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=191)
     */
    private ?string $name;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", options={"default"=0})
     */
    private ?int $seniority;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", options={"default"=0.0})
     */
    private ?float $estimated;

    /**
     * @var Collection|Task[]
     * @ORM\OneToMany(targetEntity="App\Infrastructure\Entity\Task", mappedBy="developer", orphanRemoval=true)
     */
    private $tasks;

    /**
     * @return Collection|Task[]|array
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    /**
     * @param Task $task
     * @return $this
     * @throws InvalidArgumentException
     */
    public function addTask(Task $task): self
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks[] = $task;
            $task->setDeveloper($this);
        }

        return $this;
    }

    /**
     * @param Task $task
     * @return $this
     * @throws InvalidArgumentException
     */
    public function removeTask(Task $task): self
    {
        if ($this->tasks->contains($task)) {
            $this->tasks->removeElement($task);
            if ($task->getDeveloper() === $this) {
                $task->setDeveloper(null);
            }
        }

        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param string|null $name
     * @return Developer
     */
    public function setName(?string $name): Developer
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return int|null
     */
    public function getSeniority(): ?int
    {
        return $this->seniority;
    }

    /**
     * @param int|null $seniority
     */
    public function setSeniority(?int $seniority): void
    {
        $this->seniority = $seniority;
    }

    /**
     * @return float|null
     */
    public function getEstimated(): ?float
    {
        return $this->estimated;
    }

    /**
     * @param float|null $estimated
     */
    public function setEstimated(?float $estimated): void
    {
        $this->estimated = $estimated;
    }
}