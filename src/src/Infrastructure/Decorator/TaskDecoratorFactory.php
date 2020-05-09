<?php

namespace App\Infrastructure\Decorator;

use App\Domain\Enum\ResourceEnum;
use App\Infrastructure\Decorator\Contract\TaskDecoratorContract;

/**
 * Class TaskDecoratorFactory
 * @package App\Infrastructure\Decorator
 */
final class TaskDecoratorFactory
{
    /**
     * @return TaskDecoratorContract
     */
    public static function createTaskDecoratorManager(): TaskDecoratorContract
    {
        return new TaskDecoratorV1(new TaskDecoratorV2());
    }
}