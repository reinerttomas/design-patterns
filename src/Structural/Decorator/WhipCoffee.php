<?php

declare(strict_types=1);

namespace App\Structural\Decorator;

class WhipCoffee implements Coffee
{
    public function __construct(private Coffee $coffee)
    {
    }

    public function cost(): int
    {
        return $this->coffee->cost() + 5;
    }

    public function description(): string
    {
        return $this->coffee->description() . ', whip';
    }
}
