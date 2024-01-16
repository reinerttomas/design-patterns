<?php

declare(strict_types=1);

namespace App\Behavioral\Visitor;

interface Animal
{
    public function accept(AnimalOperation $operation): string;
}
