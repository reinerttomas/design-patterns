<?php

declare(strict_types=1);

namespace App\Behavioral\Observer;

class JobPost
{
    public function __construct(private string $title)
    {
    }

    public function title(): string
    {
        return $this->title;
    }
}
