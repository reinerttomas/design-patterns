<?php

declare(strict_types=1);

namespace App\Creational\AbstractFactory\Expert;

class Carpenter implements DoorFittingExpert
{
    public function description(): string
    {
        return 'I can only fit wooden doors';
    }
}
