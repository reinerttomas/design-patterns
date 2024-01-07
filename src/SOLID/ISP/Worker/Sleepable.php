<?php

declare(strict_types=1);

namespace App\SOLID\ISP\Worker;

interface Sleepable
{
    public function sleep(): string;
}
