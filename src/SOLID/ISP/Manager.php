<?php

declare(strict_types=1);

namespace App\SOLID\ISP;

use App\SOLID\ISP\Worker\Managable;

class Manager
{
    /**
     * @return non-empty-list<string>
     */
    public function manage(Managable $worker): array
    {
        return $worker->beManaged();
    }
}
