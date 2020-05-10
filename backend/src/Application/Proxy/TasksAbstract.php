<?php

namespace App\Application\Proxy;

use App\Application\Proxy\Contract\TasksContract;

abstract class TasksAbstract implements TasksContract
{
    protected ?array $tasks = null;


}