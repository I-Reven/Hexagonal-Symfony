<?php

namespace App\Application\Proxy;

use App\Application\Proxy\Contract\TasksContract;
use App\Domain\Entity\Task;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class TasksProxy extends TasksAbstract implements TasksContract
{
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
        if ($this->tasks == null)
        {
            $this->tasks = TasksSingleton::getInstance()->getTasks();
        }

        return $this->tasks;
    }
}