<?php
declare(strict_types=1);

namespace Tests\Unit;

use App\Creational\Builder\BurgerBuilder;

it('make burger with pepperoni, lettuce, tomato', function () {
    $burger = BurgerBuilder::make(14)
        ->withPepperoni()
        ->withLettuce()
        ->withTomato()
        ->build();

    expect($burger->getSize())
        ->toBe(14)
        ->and($burger->isCheese())
        ->toBeFalse()
        ->and($burger->isPepperoni())
        ->toBeTrue()
        ->and($burger->isLettuce())
        ->toBeTrue()
        ->and($burger->isTomato())
        ->toBeTrue();
});
