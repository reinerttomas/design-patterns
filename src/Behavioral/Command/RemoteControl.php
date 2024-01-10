<?php

declare(strict_types=1);

namespace App\Behavioral\Command;

class RemoteControl
{
    public function submit(Command $command): string
    {
        return $command->execute();
    }
}
