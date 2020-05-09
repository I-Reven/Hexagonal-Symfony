<?php

namespace App\Domain\Contract\Decorator;

use App\Infrastructure\Decorator\Contract\TaskParserDelegate;
use App\Infrastructure\Decorator\Contract\TaskRequestDelegate;

interface TaskDecoratorContract extends TaskParserDelegate, TaskRequestDelegate
{

}