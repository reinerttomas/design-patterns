<?php

declare(strict_types=1);

namespace App\Structural\Decorator;

interface Coffee
{
    public function cost(): int;

    public function description(): string;
}
