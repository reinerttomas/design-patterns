<?php

declare(strict_types=1);

namespace App\SOLID\ISP\Worker;

class HumanWorker implements Managable, Sleepable, Workable
{
    public function beManaged(): array
    {
        $result = [];

        $result[] = $this->work();
        $result[] = $this->sleep();

        return $result;
    }

    public function work(): string
    {
        return 'working';
    }

    public function sleep(): string
    {
        return 'sleeping';
    }
}
