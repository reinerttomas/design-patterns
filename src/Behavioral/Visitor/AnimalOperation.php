<?php

declare(strict_types=1);

namespace App\Behavioral\Visitor;

interface AnimalOperation
{
    public function visitMonkey(Monkey $monkey): string;

    public function visitLion(Lion $lion): string;

    public function visitDolphin(Dolphin $dolphin): string;
}
