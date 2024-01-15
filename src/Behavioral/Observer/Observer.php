<?php

declare(strict_types=1);

namespace App\Behavioral\Observer;

interface Observer
{
    public function onJobPosted(JobPost $job): string;
}
