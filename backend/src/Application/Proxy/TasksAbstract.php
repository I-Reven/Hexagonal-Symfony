<?php

namespace App\Application\Proxy;

use App\Application\Proxy\Contract\TasksContract;

/**
 * Class TasksAbstract
 * @package App\Application\Proxy
 */
abstract class TasksAbstract implements TasksContract
{
    protected ?array $tasks = null;


}