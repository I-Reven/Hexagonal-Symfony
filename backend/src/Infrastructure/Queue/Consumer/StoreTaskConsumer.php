<?php

namespace App\Infrastructure\Queue\Consumer;

use App\Application\Service\Contract\TaskServiceContract;
use App\Domain\Message\StoreTaskMessage;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

/**
 * Class StoreTaskConsumer
 * @package App\Infrastructure\Queue\Consumer
 */
class StoreTaskConsumer implements MessageHandlerInterface
{
    /** @var TaskServiceContract  */
    private TaskServiceContract $taskService;

    /**
     * StoreTaskConsumer constructor.
     * @param TaskServiceContract $taskService
     */
    public function __construct(TaskServiceContract $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * @param StoreTaskMessage $message
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function __invoke(StoreTaskMessage $message)
    {
        $this->taskService->storeTask($message->getTask());
    }
}