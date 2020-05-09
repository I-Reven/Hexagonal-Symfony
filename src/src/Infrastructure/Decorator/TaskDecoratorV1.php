<?php

namespace App\Infrastructure\Decorator;

use App\Domain\Entity\Task;
use App\Domain\Enum\ResourceEnum;
use App\Domain\Contract\Decorator\TaskDecoratorContract;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Class TaskDecoratorV1
 * @package App\Infrastructure\Adapter
 */
class TaskDecoratorV1 extends TaskDecorator implements TaskDecoratorContract
{
    /**
     * @param array $data
     * @return Task
     */
    public function parseTask(array $data): Task
    {
        return new Task($data['id'], $data['sure'], $data['zorluk']);
    }

    /**
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function sendRequest(): ResponseInterface
    {
        $http = HttpClient::create();
        return $http->request('GET', ResourceEnum::RESOURCE_V1);
    }
}