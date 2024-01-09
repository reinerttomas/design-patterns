<?php

declare(strict_types=1);

namespace App\Structural\Flyweight;

use App\Structural\Flyweight\Tea\KarakTea;
use App\Structural\Flyweight\Tea\Tea;

class TeaMaker
{
    /** @var array<string, Tea> */
    private array $availableTea = [];

    /**
     * @return array<string, Tea>
     */
    public function availableTea(): array
    {
        return $this->availableTea;
    }

    public function make(string $preference): Tea
    {
        if (! isset($this->availableTea[$preference])) {
            $this->availableTea[$preference] = new KarakTea();
        }

        return $this->availableTea[$preference];
    }
}
