<?php

declare(strict_types=1);

namespace Tests\Unit\Structural;

use App\Structural\Proxy\LabDoor;
use App\Structural\Proxy\SecuredDoor;

it('can open and close lab door', function () {
    $door = new LabDoor();

    expect($door->open())
        ->toBe('Opening lab door')
        ->and($door->close())
        ->toBe('Closing the lab door');
});

it('can open and close secured door with password', function () {
    $labDoor = new LabDoor();
    $securedDoor = new SecuredDoor($labDoor);

    expect($securedDoor->open())
        ->toBe("Big no! It ain't possible");

    $securedDoor->authenticate('$ecr@t');

    expect($securedDoor->open())
        ->toBe('Opening lab door');
});
