<?php


namespace App\Domain\Entity;


class Developer
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var int */
    private $seniority;

    /** @var int */
    private $time;

    /**
     * Developer constructor.
     * @param int $id
     * @param string $name
     * @param int $seniority
     * @param int $time
     */
    public function __construct(int $id, string $name, int $seniority,int $time)
    {
        $this->id = $id;
        $this->name = $name;
        $this->seniority = $seniority;
        $this->time = $time;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getSeniority(): int
    {
        return $this->seniority;
    }

    /**
     * @return int
     */
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * @param Task $task
     */
    public function addTask(Task $task)
    {
        $this->time += $task->getTime();
    }

}