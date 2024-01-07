<?php

declare(strict_types=1);

namespace App\SOLID\ISP\Worker;

interface Managable
{
    /**
     * @return non-empty-list<string>
     */
    public function beManaged(): array;
}
