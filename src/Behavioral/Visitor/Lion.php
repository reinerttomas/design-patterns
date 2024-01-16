<?php

declare(strict_types=1);

namespace App\Behavioral\Visitor;

class Lion implements Animal
{
    public function roar(): string
    {
        return 'Roaaar!';
    }

    public function accept(AnimalOperation $operation): string
    {
        return $operation->visitLion($this);
    }
}
