<?php

declare(strict_types=1);

namespace App\SOLID\SRP;

class Author
{
    public function __construct(
        private string $firstName,
        private string $lastName,
    ) {
    }

    public function firstName(): string
    {
        return $this->firstName;
    }

    public function lastName(): string
    {
        return $this->lastName;
    }

    public function fullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}
