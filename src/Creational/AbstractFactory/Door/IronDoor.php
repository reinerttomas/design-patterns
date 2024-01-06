<?php

declare(strict_types=1);

namespace App\Creational\AbstractFactory\Door;

class IronDoor implements Door
{
    public function description(): string
    {
        return 'I am an iron door';
    }
}
