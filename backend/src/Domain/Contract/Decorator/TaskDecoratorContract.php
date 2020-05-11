<?php

namespace App\Domain\Contract\Decorator;

use App\Infrastructure\Decorator\Contract\TaskParserDelegate;
use App\Infrastructure\Decorator\Contract\TaskRequestDelegate;

/**
 * Interface TaskDecoratorContract
 * @package App\Domain\Contract\Decorator
 */
interface TaskDecoratorContract extends TaskParserDelegate, TaskRequestDelegate
{

}