<?php

declare(strict_types=1);

namespace App\Structural\Proxy;

interface Door
{
    public function open(): string;

    public function close(): string;
}
