<?php

namespace App\Infrastructure\Decorator;

use App\Infrastructure\Entity\Task;
use App\Infrastructure\Decorator\Contract\TaskDecoratorContract;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Class TaskDecorator
 * @package App\Infrastructure\Decorator
 */
abstract class TaskDecorator implements TaskDecoratorContract
{
    /** @var Task[] */
    protected array $tasks;

    /** @var TaskDecoratorContract|null  */
    private $nextTask;

    /**
     * TaskAdapter constructor.
     * @param TaskDecoratorContract|null $nextTask
     */
    public function __construct($nextTask = null)
    {
        $this->nextTask = $nextTask;
    }

    /**
     * @param array $data
     * @return Task
     */
    abstract public function parseTask(array $data): Task;

    /**
     * @return ResponseInterface
     */
    abstract public function sendRequest(): ResponseInterface;

    /**
     * @return Task[]|null
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getTasks(): array
    {
        if (empty($this->task)) {
            $this->renderTasks();
        }

        if ($this->nextTask === null) {
            return $this->tasks;
        }

        return array_merge($this->tasks, $this->nextTask->getTasks());
    }

    /**
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    private function renderTasks(): void
    {
        foreach ($this->sendRequest()->toArray() as $key => $item) {
            $this->tasks[] = $this->parseTask($item);
        }
    }
}