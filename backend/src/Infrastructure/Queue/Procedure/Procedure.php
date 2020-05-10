<?php

namespace App\Infrastructure\Queue\Procedure;

use Symfony\Component\Messenger\MessageBusInterface;

abstract class Procedure
{
    /** @var MessageBusInterface  */
    protected MessageBusInterface $bus;

    /**
     * Procedure constructor.
     * @param MessageBusInterface $bus
     */
    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }
}
