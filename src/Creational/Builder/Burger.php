<?php

declare(strict_types=1);

namespace App\Creational\Builder;

class Burger
{
    private int $size;
    private bool $cheese;
    private bool $pepperoni;
    private bool $lettuce;
    private bool $tomato;

    public function __construct(BurgerBuilder $builder)
    {
        $this->size = $builder->getSize();
        $this->cheese = $builder->isCheese();
        $this->pepperoni = $builder->isPepperoni();
        $this->lettuce = $builder->isLettuce();
        $this->tomato = $builder->isTomato();
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function isCheese(): bool
    {
        return $this->cheese;
    }

    public function isPepperoni(): bool
    {
        return $this->pepperoni;
    }

    public function isLettuce(): bool
    {
        return $this->lettuce;
    }

    public function isTomato(): bool
    {
        return $this->tomato;
    }
}
