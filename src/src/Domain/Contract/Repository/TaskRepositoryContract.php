<?php

namespace App\Domain\Contract\Repository;

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
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(Task $task);
}