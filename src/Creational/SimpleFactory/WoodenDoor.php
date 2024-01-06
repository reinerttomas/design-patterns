<?php

declare(strict_types=1);

namespace App\Creational\SimpleFactory;

class WoodenDoor implements Door
{
    public function __construct(
        private int $width,
        private int $height,
    ) {
    }

    public function width(): int
    {
        return $this->width;
    }

    public function height(): int
    {
        return $this->height;
    }
}
