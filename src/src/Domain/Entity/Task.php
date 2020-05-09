<?php

namespace App\Domain\Entity;

/**
 * Class Task
 * @package App\Domain\Entity
 */
class Task
{
    /** @var int */
    private $id;

    /** @var string */
    private $title;

    /** @var int */
    private $time;

    /** @var int */
    private $complex;

    /**
     * Task constructor.
     * @param int $id
     * @param string $title
     * @param int $time
     * @param int $complex
     */
    public function __construct(string $title, int $time, int $complex, int $id = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->time = $time;
        $this->complex = $complex;
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
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * @return int
     */
    public function getComplex(): int
    {
        return $this->complex;
    }

}