<?php

namespace App\Infrastructure\Entity;

use App\Domain\Exception\InvalidArgumentException;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * Class Task
 * @package App\Domain\Entity
 *
 * @ORM\Entity(repositoryClass="App\Infrastructure\Repository\TaskRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Task
{
    use Timestamps;

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
     * @ORM\Column(type="string", length=191, options={"default"=""})
     */
    private ?string $title;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"default"=0})
     */
    private ?int $estimated;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"default"=0})
     */
    private ?int $level;

    /**
     * @var Developer|null
     * @ORM\ManyToOne(targetEntity="App\Infrastructure\Entity\Developer")
     * @JoinColumn(name="developer_id", referencedColumnName="id")
     */
    private ?Developer $developer;

    /**
     * @return null
     */
    public function getDeveloper()
    {
        return $this->developer;
    }

    /**
     * @param null|Developer $developer
     * @throws InvalidArgumentException
     */
    public function setDeveloper($developer) {
        if($developer === null) {

            if($this->developer !== null) {
                $this->developer->getTasks()->removeElement($this);
            }

            $this->developer = null;
        } else {

            if(!$developer instanceof Developer) {
                throw new InvalidArgumentException('$developer must be null or instance of Developer');
            }

            if($this->developer !== null) {
                $this->developer->getTasks()->removeElement($this);
            }

            $this->developer = $developer;
            $developer->getTasks()->add($this);
        }
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
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    /**
     * @return int
     */
    public function getEstimated(): int
    {
        return $this->estimated;
    }

    /**
     * @param int $estimated
     */
    public function setEstimated(int $estimated): void
    {
        $this->estimated = $estimated;
    }

    /**
     * @return int
     */
    public function getRealizeEstimate(): int
    {
        return $this->level * $this->estimated;
    }
}
