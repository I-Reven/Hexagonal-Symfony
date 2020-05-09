<?php

namespace App\Infrastructure\Queue\Consumer;

use App\Application\Service\Contract\TaskServiceContract;
use App\Domain\Message\AssignTaskMessage;
use App\Domain\Message\StoreTaskMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

/**
 * Class AssignTaskConsumer
 * @package App\Infrastructure\Queue\Consumer
 */
class AssignTaskConsumer implements MessageHandlerInterface
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
     * @param AssignTaskMessage $message
     */
    public function __invoke(AssignTaskMessage $message)
    {
        $this->taskService->assignTask($message->getTask());
    }
}