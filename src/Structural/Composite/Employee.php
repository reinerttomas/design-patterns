<?php

declare(strict_types=1);

namespace App\Structural\Composite;

interface Employee
{
    public function __construct(string $name, float $salary);

    public function getName(): string;

    public function getSalary(): float;
}
