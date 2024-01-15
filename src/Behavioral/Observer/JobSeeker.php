<?php

declare(strict_types=1);

namespace App\Behavioral\Observer;

class JobSeeker implements Observer
{
    public function __construct(private string $name)
    {
    }

    public function onJobPosted(JobPost $job): string
    {
        return sprintf('Hi %s! New job posted: %s', $this->name, $job->title());
    }
}
