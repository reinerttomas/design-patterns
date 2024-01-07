<?php

declare(strict_types=1);

namespace App\SOLID\ISP\Worker;

interface Workable
{
    public function work(): string;
}
