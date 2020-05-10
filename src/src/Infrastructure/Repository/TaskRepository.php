<?php

namespace App\Infrastructure\Repository;

use App\Domain\Contract\Repository\TaskRepositoryContract;
use App\Infrastructure\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class TaskRepository extends EntityRepository implements TaskRepositoryContract
{
    /** @var EntityManagerInterface */
    protected $entityManager;

   public function __construct(EntityManagerInterface $entityManager, Mapping\ClassMetadata $class)
   {
       $this->entityManager = $entityManager;
       parent::__construct($entityManager, $class);
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

//        dump($task);
    }
}