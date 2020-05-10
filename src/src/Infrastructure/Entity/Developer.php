<?php

namespace App\Infrastructure\Entity;

class Developer
{
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
     */
    private ?string $name;

    /** @var int|null */
    private ?int $seniority;

    /** @var int|null */
    private ?int $estimated;
}