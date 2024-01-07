<?php

declare(strict_types=1);

namespace App\Creational\Prototype;

class Sheep
{
    public function __construct(
        private string $name,
        private string $category,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }
}
