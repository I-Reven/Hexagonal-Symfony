<?php

namespace App\Infrastructure\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;

/**
 * Class Task
 * @package App\Domain\Entity
 *
 * @ORM\Entity(repositoryClass="App\Infrastructure\Repository\TaskRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 */
class Task
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=191)
     */
    private ?string $title;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private ?int $estimated;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private ?int $level;

    /**
     * @ORM\Column(type="integer")
     * @OneToOne(targetEntity="Developer", orphanRemoval=true)
     */
    private $developer;

    /**
     * Task constructor.
     * @param int|null $id
     * @param string|null $title
     * @param int|null $estimated
     * @param int|null $level
     * @param $developer
     */
    public function __construct(?int $id = null, ?string $title = null, ?int $estimated = null, ?int $level = null, $developer = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->estimated = $estimated;
        $this->level = $level;
        $this->developer = $developer;
    }

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
     * @return int
     */
    public function getEstimated(): int
    {
        return $this->estimated;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

}