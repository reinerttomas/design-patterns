<?php

declare(strict_types=1);

namespace App\Structural\Composite;

class Developer implements Employee
{
    public function __construct(
        private string $name,
        private float $salary
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }
}
