<?php

declare(strict_types=1);

namespace App\Behavioral\Command;

class TurnOff implements Command
{
    public function __construct(private Bulb $bulb)
    {
    }

    public function execute(): string
    {
        return $this->bulb->turnOff();
    }

    public function undo(): string
    {
        return $this->bulb->turnOn();
    }

    public function redo(): string
    {
        return $this->execute();
    }
}
