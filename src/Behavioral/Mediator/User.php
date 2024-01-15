<?php

declare(strict_types=1);

namespace App\Behavioral\Mediator;

class User
{
    public function __construct(
        private string $name,
        private ChatRoomMediator $chatRoomMediator,
    ) {
    }

    public function name(): string
    {
        return $this->name;
    }

    public function send(string $message): string
    {
        return $this->chatRoomMediator->showMessage($this, $message);
    }
}
