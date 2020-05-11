<?php

namespace App\Domain\Contract\Repository;

use App\Domain\Exception\InvalidArgumentException;
use App\Infrastructure\Entity\Developer;
use App\Infrastructure\Entity\Task;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

/**
 * Interface TaskRepositoryContract
 * @package App\Domain\Contract\Repository
 */
interface TaskRepositoryContract
{
    /**
     * @param Task $task
     * @param Developer $developer
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws InvalidArgumentException
     */
    public function assignDeveloper(Task $task, Developer $developer);

    /**
     * @param Task $task
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(Task $task);
}