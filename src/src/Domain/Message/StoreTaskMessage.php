<?php

namespace App\Domain\Message;

use App\Domain\Entity\Task;

class StoreTaskMessage
{
    /** @var Task */
    private Task $task;

    /**
     * StoreTaskMessage constructor.
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