<?php

declare(strict_types=1);

namespace Tests\Unit\Structural;

use App\Structural\Flyweight\TeaMaker;
use App\Structural\Flyweight\TeaShop;

it('can take order for tea', function () {
    $teaMaker = new TeaMaker();
    $teaShop = new TeaShop($teaMaker);

    $teaShop->takeOrder('less sugar', 1);
    $teaShop->takeOrder('more milk', 2);
    $teaShop->takeOrder('more milk', 3);
    $teaShop->takeOrder('without sugar', 4);

    expect($teaMaker->availableTea())
        ->toHaveCount(3)
        ->toHaveKeys(['less sugar', 'more milk', 'without sugar'])
        ->and($teaShop->orderCount())
        ->toBe(4)
        ->and($teaShop->serve())
        ->toBe([
            'Serving tea to table# 1',
            'Serving tea to table# 2',
            'Serving tea to table# 3',
            'Serving tea to table# 4',
        ]);
});
