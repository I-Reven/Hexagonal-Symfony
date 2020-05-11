<?php

namespace App\Infrastructure\Decorator\Contract;

use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Interface TaskRequestDelegate
 * @package App\Infrastructure\Decorator\Contract
 */
interface TaskRequestDelegate
{
    /**
     * @return ResponseInterface
     */
    public function sendRequest(): ResponseInterface;
}