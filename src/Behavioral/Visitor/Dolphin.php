<?php

declare(strict_types=1);

namespace App\Behavioral\Visitor;

class Dolphin implements Animal
{
    public function speak(): string
    {
        return 'Tuut tuttu tuutt!';
    }

    public function accept(AnimalOperation $operation): string
    {
        return $operation->visitDolphin($this);
    }
}
