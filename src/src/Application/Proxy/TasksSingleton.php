<?php

namespace App\Application\Proxy;

use App\Application\Proxy\Contract\TasksContract;
use App\Infrastructure\Entity\Task;
use App\Infrastructure\Decorator\Contract\TaskDecoratorContract;
use App\Infrastructure\Decorator\TaskDecoratorFactory;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class TasksSingleton
 * @package App\Application\Proxy
 */
final class TasksSingleton extends TasksAbstract implements TasksContract
{
    private static ?TasksSingleton $instance = null;
    private TaskDecoratorContract $taskDecorator;

    /**
     * TasksSingleton constructor.
     * @param TaskDecoratorContract $taskDecorator
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    private function __construct(TaskDecoratorContract $taskDecorator)
    {
        $this->taskDecorator = $taskDecorator;
        $this->tasks = $this->taskDecorator->getTasks();
    }

    /**
     * @return TasksSingleton|null
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new TasksSingleton((new TaskDecoratorFactory())->createTaskDecoratorManager());
        }

        return self::$instance;
    }

    /**
     * @return Task[]|array|null
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getTasks(): ?array
    {
        if ($this->tasks === null) {
            $this->tasks = $this->taskDecorator->getTasks();
        }

        return $this->tasks;
    }
}