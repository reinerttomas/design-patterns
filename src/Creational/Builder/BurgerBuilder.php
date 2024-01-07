<?php

declare(strict_types=1);

namespace App\Creational\Builder;

class BurgerBuilder
{
    private bool $cheese = false;
    private bool $pepperoni = false;
    private bool $lettuce = false;
    private bool $tomato = false;

    public function __construct(private int $size)
    {
    }

    public static function make(int $size): self
    {
        return new self($size);
    }

    public function build(): Burger
    {
        return new Burger($this);
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function isCheese(): bool
    {
        return $this->cheese;
    }

    public function withCheese(): self
    {
        $this->cheese = true;

        return $this;
    }

    public function isPepperoni(): bool
    {
        return $this->pepperoni;
    }

    public function withPepperoni(): self
    {
        $this->pepperoni = true;

        return $this;
    }

    public function isLettuce(): bool
    {
        return $this->lettuce;
    }

    public function withLettuce(): self
    {
        $this->lettuce = true;

        return $this;
    }

    public function isTomato(): bool
    {
        return $this->tomato;
    }

    public function withTomato(): self
    {
        $this->tomato = true;

        return $this;
    }
}
