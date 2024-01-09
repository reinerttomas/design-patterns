<?php

declare(strict_types=1);

namespace App\Structural\Proxy;

class LabDoor implements Door
{
    public function open(): string
    {
        return 'Opening lab door';
    }

    public function close(): string
    {
        return 'Closing the lab door';
    }
}
