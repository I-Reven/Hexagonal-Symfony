<?php

namespace App\Infrastructure\Queue\Procedure;

use App\Domain\Contract\Queue\Procedure\AssignTaskProcedureContract;
use App\Domain\Entity\Task;
use App\Domain\Message\AssignTaskMessage;

/**
 * Class StoreTaskProcedure
 * @package App\Infrastructure\Queue\Procedure
 */
class AssignTaskProcedure extends Procedure implements AssignTaskProcedureContract
{

    /**
     * @param Task $task
     */
    public function handle(Task $task)
    {
        $this->bus->dispatch(New AssignTaskMessage($task));
    }
}