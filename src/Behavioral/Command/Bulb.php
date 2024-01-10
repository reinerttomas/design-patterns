<?php

declare(strict_types=1);

namespace App\Behavioral\Command;

class Bulb
{
    public function turnOn(): string
    {
        return 'Bulb has been lit!';
    }

    public function turnOff(): string
    {
        return 'Darkness!';
    }
}
