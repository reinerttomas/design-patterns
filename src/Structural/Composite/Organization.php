<?php

declare(strict_types=1);

namespace App\Structural\Composite;

class Organization
{
    /** @var array<Employee> */
    private array $employees;

    public function __construct()
    {
        $this->employees = [];
    }

    /**
     * @return array<Employee>
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }

    public function addEmployee(Employee $employee): void
    {
        $this->employees[] = $employee;
    }

    public function getNetSalaries(): float
    {
        $netSalaries = 0;

        foreach ($this->employees as $employee) {
            $netSalaries += $employee->getSalary();
        }

        return $netSalaries;
    }
}
