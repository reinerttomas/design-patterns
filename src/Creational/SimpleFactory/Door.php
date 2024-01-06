<?php

declare(strict_types=1);

namespace App\Creational\SimpleFactory;

interface Door
{
    public function width(): int;

    public function height(): int;
}
