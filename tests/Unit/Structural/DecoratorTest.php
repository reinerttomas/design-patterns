<?php

declare(strict_types=1);

namespace Tests\Unit\Structural;

use App\Structural\Decorator\MilkCoffee;
use App\Structural\Decorator\SimpleCoffee;
use App\Structural\Decorator\VanillaCoffee;
use App\Structural\Decorator\WhipCoffee;

it('can make coffee', function () {
    $someCoffee = new SimpleCoffee();

    expect($someCoffee->cost())
        ->toBe(10)
        ->and($someCoffee->description())
        ->toBe('Simple coffee');

    $someCoffee = new MilkCoffee($someCoffee);

    expect($someCoffee->cost())
        ->toBe(12)
        ->and($someCoffee->description())
        ->toBe('Simple coffee, milk');

    $someCoffee = new WhipCoffee($someCoffee);

    expect($someCoffee->cost())
        ->toBe(17)
        ->and($someCoffee->description())
        ->toBe('Simple coffee, milk, whip');

    $someCoffee = new VanillaCoffee($someCoffee);

    expect($someCoffee->cost())
        ->toBe(20)
        ->and($someCoffee->description())
        ->toBe('Simple coffee, milk, whip, vanilla');
});
