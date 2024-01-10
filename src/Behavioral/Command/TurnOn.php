<?php

declare(strict_types=1);

namespace App\Behavioral\Command;

class TurnOn implements Command
{
    public function __construct(private Bulb $bulb)
    {
    }

    public function execute(): string
    {
        return $this->bulb->turnOn();
    }

    public function undo(): string
    {
        return $this->bulb->turnOff();
    }

    public function redo(): string
    {
        return $this->execute();
    }
}
