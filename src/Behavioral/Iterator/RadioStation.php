<?php

declare(strict_types=1);

namespace App\Behavioral\Iterator;

readonly class RadioStation
{
    public function __construct(public int $frequency)
    {
    }
}
