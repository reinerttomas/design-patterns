<?php

declare(strict_types=1);

namespace App\Behavioral\Visitor;

class Monkey implements Animal
{
    public function shout(): string
    {
        return 'Ooh oo aa aa!';
    }

    public function accept(AnimalOperation $operation): string
    {
        return $operation->visitMonkey($this);
    }
}
