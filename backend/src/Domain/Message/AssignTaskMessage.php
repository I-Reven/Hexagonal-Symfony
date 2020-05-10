<?php

namespace App\Domain\Message;

use App\Infrastructure\Entity\Task;

class AssignTaskMessage
{
    /** @var Task */
    private Task $task;

    /**
     * AssignTaskMessage constructor.
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * @return Task
     */
    public function getTask(): Task
    {
        return $this->task;
    }
}