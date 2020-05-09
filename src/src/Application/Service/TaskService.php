<?php

namespace App\Application\Service;

use App\Application\Proxy\Contract\TasksContract;
use App\Application\Service\Contract\TaskServiceContract;
use App\Domain\Contract\Queue\Procedure\StoreTaskProcedureContract;
use App\Domain\Entity\Task;
use App\Infrastructure\Queue\Procedure\AssignTaskProcedure;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class TaskService
 * @package App\Application\Service
 */
class TaskService implements TaskServiceContract
{

    /** @var TasksContract */
    private TasksContract $tasksContract;

    /** @var StoreTaskProcedureContract  */
    private StoreTaskProcedureContract $storeTaskProcedure;

    /** @var AssignTaskProcedure  */
    private AssignTaskProcedure $assignTaskProcedure;

    /**
     * TaskService constructor.
     * @param TasksContract $tasksContract
     * @param StoreTaskProcedureContract $storeTaskProcedure
     * @param AssignTaskProcedure $assignTaskProcedure
     */
    public function __construct(TasksContract $tasksContract, StoreTaskProcedureContract $storeTaskProcedure, AssignTaskProcedure $assignTaskProcedure)
    {
        $this->tasksContract = $tasksContract;
        $this->storeTaskProcedure = $storeTaskProcedure;
        $this->assignTaskProcedure = $assignTaskProcedure;
    }

    /**
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function registerTasks()
    {
        $tasks = $this->tasksContract->getTasks();
        $this->storeTaskProcedure->handle($tasks);
    }

    /**
     * @param Task $task
     */
    public function storeTask(Task $task){

        $this->assignTaskProcedure->handle($task);
    }

    /**
     * @param Task $task
     */
    public function assignTask(Task $task){
        dump($task);
    }
}