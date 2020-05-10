<?php

namespace App\Infrastructure\Decorator;

use App\Domain\Contract\Decorator\TaskDecoratorContract;
use App\Infrastructure\Entity\Task;
use App\Domain\Enum\ResourceEnum;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Class TaskDecoratorV2
 * @package App\Infrastructure\Adapter
 */
class TaskDecoratorV2 extends TaskDecorator implements TaskDecoratorContract
{
    /**
     * @param array $data
     * @return Task
     */
    public function parseTask(array $data): Task
    {
        return new Task(
            null,
            array_keys($data)[0],
            $data[array_keys($data)[0]]['estimated_duration'],
            $data[array_keys($data)[0]]['level']
        );
    }

    /**
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function sendRequest(): ResponseInterface
    {
        $http = HttpClient::create();
        return $http->request('GET', ResourceEnum::RESOURCE_V2);
    }
}