<?php

declare(strict_types=1);

namespace App\Behavioral\Mediator;

interface ChatRoomMediator
{
    public function showMessage(User $user, string $message): string;
}
