<?php

namespace App\Domain\Contract\Service;

use App\Infrastructure\Entity\Developer;
use App\Infrastructure\Entity\Task;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

/**
 * Interface DeveloperServiceContract
 * @package App\Domain\Contract\Service
 */
interface DeveloperServiceContract
{
    /**
     * @return array
     */
    public function getDevelopers(): array;

    /**
     * @param Task $task
     */
    public function assignTask(Task $task);
}
