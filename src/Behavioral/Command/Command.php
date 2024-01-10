<?php

declare(strict_types=1);

namespace App\Behavioral\Command;

interface Command
{
    public function execute(): string;

    public function undo(): string;

    public function redo(): string;
}
