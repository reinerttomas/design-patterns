<?php

declare(strict_types=1);

namespace Tests\Unit\Behavioral;

use App\Behavioral\Visitor\Dolphin;
use App\Behavioral\Visitor\Jump;
use App\Behavioral\Visitor\Lion;
use App\Behavioral\Visitor\Monkey;
use App\Behavioral\Visitor\Speak;

it('can visit monkey', function () {
    $monkey = new Monkey();

    $speak = new Speak();
    $jump = new Jump();

    expect($monkey->accept($speak))
        ->toBe('Ooh oo aa aa!')
        ->and($monkey->accept($jump))
        ->toBe('Jumped 20 feet high! on to the tree!');
});

it('can visit lion', function () {
    $lion = new Lion();

    $speak = new Speak();
    $jump = new Jump();

    expect($lion->accept($speak))
        ->toBe('Roaaar!')
        ->and($lion->accept($jump))
        ->toBe('Jumped 7 feet! Back on the ground!');
});

it('can visit dolphin', function () {
    $dolphin = new Dolphin();

    $speak = new Speak();
    $jump = new Jump();

    expect($dolphin->accept($speak))
        ->toBe('Tuut tuttu tuutt!')
        ->and($dolphin->accept($jump))
        ->toBe('Walked on water a little and disappeared');
});
