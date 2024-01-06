<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Creational\SimpleFactory\DoorFactory;

it('make door 100x200', function () {
    $door = DoorFactory::makeDoor(100, 200);

    expect(100)
        ->toBe($door->width())
        ->and(200)
        ->toBe($door->height());
});

it('make door 50x100', function () {
    $door = DoorFactory::makeDoor(50, 100);

    expect(50)
        ->toBe($door->width())
        ->and(100)
        ->toBe($door->height());
});
