<?php

declare(strict_types=1);

namespace App\Behavioral\Observer;

interface Observable
{
    public function notify(JobPost $job): void;
}
