<?php

namespace App\Domain\Contract\Queue\Procedure;

use App\Infrastructure\Entity\Task;

/**
 * Interface AssignTaskProcedureContract
 * @package App\Domain\Contract\Queue\Procedure
 */
interface AssignTaskProcedureContract
{
    /**
     * @param Task $task
     */
    public function handle(Task $task);
}