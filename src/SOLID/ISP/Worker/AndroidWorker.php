<?php

declare(strict_types=1);

namespace App\SOLID\ISP\Worker;

class AndroidWorker implements Managable, Workable
{
    public function beManaged(): array
    {
        $result = [];

        $result[] = $this->work();

        return $result;
    }

    public function work(): string
    {
        return 'working';
    }
}
