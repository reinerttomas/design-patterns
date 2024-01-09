<?php

declare(strict_types=1);

namespace App\Structural\Proxy;

class SecuredDoor implements Door
{
    private bool $isAuthenticated = false;

    public function __construct(private Door $door)
    {
    }

    public function open(): string
    {
        if ($this->isAuthenticated) {
            return $this->door->open();
        } else {
            return "Big no! It ain't possible";
        }
    }

    public function close(): string
    {
        return $this->door->close();
    }

    public function authenticate(string $password): void
    {
        $this->isAuthenticated = $password === '$ecr@t';
    }
}
