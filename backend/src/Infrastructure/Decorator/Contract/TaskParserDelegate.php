<?php

namespace App\Infrastructure\Decorator\Contract;

use App\Infrastructure\Entity\Task;

/**
 * Interface TaskParserDelegate
 * @package App\Infrastructure\Decorator\Contract
 */
interface TaskParserDelegate
{

    /**
     * @param array $data
     * @return Task
     */
    public function parseTask(array $data): Task;
}