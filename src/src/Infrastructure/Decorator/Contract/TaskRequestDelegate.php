<?php


namespace App\Infrastructure\Decorator\Contract;


use Symfony\Contracts\HttpClient\ResponseInterface;

interface TaskRequestDelegate
{
    /**
     * @return ResponseInterface
     */
    public function sendRequest(): ResponseInterface;
}