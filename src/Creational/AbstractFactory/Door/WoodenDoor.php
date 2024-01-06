<?php

declare(strict_types=1);

namespace App\Creational\AbstractFactory\Door;

class WoodenDoor implements Door
{
    public function description(): string
    {
        return 'I am a wooden door';
    }
}
