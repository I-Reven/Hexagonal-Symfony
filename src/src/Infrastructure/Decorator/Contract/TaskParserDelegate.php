<?php


namespace App\Infrastructure\Decorator\Contract;


use App\Domain\Entity\Task;

interface TaskParserDelegate
{

    /**
     * @param array $data
     * @return Task
     */
    public function parseTask(array $data): Task;
}