<?php

namespace App\Infrastructure\Queue\Procedure;

use App\Domain\Contract\Queue\Procedure\StoreTaskProcedureContract;
use App\Infrastructure\Entity\Task;
use App\Domain\Message\StoreTaskMessage;

/**
 * Class StoreTaskProcedure
 * @package App\Infrastructure\Queue\Procedure
 */
class StoreTaskProcedure extends Procedure implements StoreTaskProcedureContract
{
    /**
     * @param Task[]|array|null
     */
    public function handle(array $tasks)
    {
        foreach ($tasks as $task){
            $this->bus->dispatch(New StoreTaskMessage($task));
        }
    }
}