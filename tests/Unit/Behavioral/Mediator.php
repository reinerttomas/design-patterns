<?php

declare(strict_types=1);

namespace Tests\Unit\Behavioral;

use App\Behavioral\Mediator\ChatRoom;
use App\Behavioral\Mediator\User;

it('can send messages via chat room.', function () {
    $chatRoom = new ChatRoom();

    $john = new User('John Doe', $chatRoom);
    $jane = new User('Jane Doe', $chatRoom);

    expect($john->send('Hi there!'))
        ->toBe('John Doe says: Hi there!')
        ->and($jane->send('Hey!'))
        ->toBe('Jane Doe says: Hey!');
});
