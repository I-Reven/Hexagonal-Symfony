<?php

namespace App\Domain\Contract\Queue\Procedure;

use App\Domain\Entity\Task;

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