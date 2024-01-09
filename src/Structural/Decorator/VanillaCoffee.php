<?php

declare(strict_types=1);

namespace App\Structural\Decorator;

class VanillaCoffee implements Coffee
{
    public function __construct(private Coffee $coffee)
    {
    }

    public function cost(): int
    {
        return $this->coffee->cost() + 3;
    }

    public function description(): string
    {
        return $this->coffee->description() . ', vanilla';
    }
}
