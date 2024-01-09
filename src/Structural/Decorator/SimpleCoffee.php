<?php

declare(strict_types=1);

namespace App\Structural\Decorator;

class SimpleCoffee implements Coffee
{
    public function cost(): int
    {
        return 10;
    }

    public function description(): string
    {
        return 'Simple coffee';
    }
}
