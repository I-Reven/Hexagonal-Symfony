<?php

namespace App\Domain\Contract\Queue\Procedure;

use App\Domain\Entity\Task;

/**
 * Interface StoreTaskProcedureContract
 * @package App\Domain\Contract\Queue\Procedure
 */
interface StoreTaskProcedureContract
{
    /**
     * @param Task[]|array|null
     */
    public function handle(array $tasks);
}