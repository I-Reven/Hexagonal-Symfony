<?php

namespace App\Infrastructure\Repository;

use App\Domain\Contract\Repository\DeveloperRepositoryContract;
use App\Infrastructure\Entity\Developer;
use App\Infrastructure\Entity\Task;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

/**
 * Class DeveloperRepository
 * @package App\Infrastructure\Repository
 */
class DeveloperRepository extends EntityRepository implements DeveloperRepositoryContract
{
    /** @var EntityManagerInterface */
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager, Mapping\ClassMetadata $class)
    {
        $this->entityManager = $entityManager;
        parent::__construct($entityManager, $class);
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->findAll();
    }

    /**
     * @return Developer|object|null
     */
    public function getFreeDeveloper()
    {
        return $this->findOneBy([], ['estimated' => 'ASC']);
    }

    /**
     * @param Task $task
     * @return Developer|object|null
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function assignTask(Task $task)
    {
        $developer = $this->getFreeDeveloper();

        $developer->setEstimated(
            $developer->getEstimated() + ($task->getRealizeEstimate() / $developer->getSeniority())
        );

        $this->save($developer);

        return $developer;
    }

    /**
     * @param Developer $developer
     * @param Task $task
     * @return Developer|object|null
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function deAssignTask(Developer $developer, Task $task)
    {
        $developer->setEstimated(
            ($developer->getEstimated() - ($task->getRealizeEstimate()) * $developer->getSeniority())
        );

        $this->save($developer);

        return $developer;
    }

    /**
     * @param Developer $developer
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(Developer $developer)
    {
        $this->_em->persist($developer);
        $this->_em->flush();
    }

}