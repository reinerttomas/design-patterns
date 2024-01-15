<?php

declare(strict_types=1);

namespace App\Behavioral\Mediator;

class ChatRoom implements ChatRoomMediator
{
    public function showMessage(User $user, string $message): string
    {
        return sprintf('%s says: %s', $user->name(), $message);
    }
}
