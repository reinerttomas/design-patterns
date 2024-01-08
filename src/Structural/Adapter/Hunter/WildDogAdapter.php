<?php

declare(strict_types=1);

namespace App\Structural\Adapter\Hunter;

class WildDogAdapter implements Lion
{
    public function __construct(
        private WildDog $dog
    ) {
    }

    public function roar(): string
    {
        return $this->dog->bark();
    }
}
