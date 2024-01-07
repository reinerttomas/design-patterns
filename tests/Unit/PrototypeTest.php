<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Creational\Prototype\Sheep;

it('clone Jolly to Dolly', function () {
    $jolly = new Sheep('Jolly', 'Mountain Sheep');

    expect($jolly->getName())
        ->toBe('Jolly')
        ->and($jolly->getCategory())
        ->toBe('Mountain Sheep');

    $dolly = clone $jolly;
    $dolly->setName('Dolly');

    expect($dolly->getName())
        ->toBe('Dolly')
        ->and($dolly->getCategory())
        ->toBe('Mountain Sheep');
});
