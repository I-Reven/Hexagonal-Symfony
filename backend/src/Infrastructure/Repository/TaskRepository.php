<?php

namespace App\Infrastructure\Repository;

use App\Domain\Contract\Repository\TaskRepositoryContract;
use App\Domain\Exception\InvalidArgumentException;
use App\Infrastructure\Entity\Developer;
use App\Infrastructure\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

/**
 * Class TaskRepository
 * @package App\Infrastructure\Repository
 */
class TaskRepository extends EntityRepository implements TaskRepositoryContract
{
    /** @var EntityManagerInterface */
    protected EntityManagerInterface $entityManager;

    /**
     * TaskRepository constructor.
     * @param EntityManagerInterface $entityManager
     * @param Mapping\ClassMetadata $class
     */
   public function __construct(EntityManagerInterface $entityManager, Mapping\ClassMetadata $class)
   {
       $this->entityManager = $entityManager;
       parent::__construct($entityManager, $class);
   }

    /**
     * @param Task $task
     * @param Developer $developer
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws InvalidArgumentException
     */
   public function assignDeveloper(Task $task, Developer $developer)
   {
       $task->setDeveloper($developer);
       $this->save($task);
   }

    /**
     * @param Task $task
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(Task $task)
    {
        $this->_em->persist($task);
        $this->_em->flush();
    }
}