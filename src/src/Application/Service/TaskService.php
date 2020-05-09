<?php

namespace App\Application\Service;

use App\Application\Proxy\Contract\TasksContract;
use App\Application\Service\Contract\TaskServiceContract;

/**
 * Class TaskService
 * @package App\Application\Service
 */
class TaskService implements TaskServiceContract
{

    /** @var TasksContract */
    private TasksContract $tasksContract;

    /**
     * TaskService constructor.
     * @param TasksContract $tasksContract
     *
     */
    public function __construct(TasksContract $tasksContract)
    {
        $this->tasksContract = $tasksContract;
    }


    public function register()
    {
        $tasks = $this->tasksContract->getTasks();
        dump($tasks);
        die();
    }
}