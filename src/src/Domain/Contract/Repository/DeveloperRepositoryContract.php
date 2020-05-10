<?php

namespace App\Domain\Contract\Repository;

use App\Infrastructure\Entity\Developer;
use App\Infrastructure\Entity\Task;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

interface DeveloperRepositoryContract
{
    /**
     * @return array
     */
    public function getAll();


    /**
     * @return Developer|object|null
     */
    public function getFreeDeveloper();

    /**
     * @param Task $task
     * @return Developer|object|null
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function assignTask(Task $task);

    /**
     * @param Developer $developer
     * @param Task $task
     * @return Developer|object|null
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function deAssignTask(Developer $developer, Task $task);

    /**
     * @param Developer $developer
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(Developer $developer);

}