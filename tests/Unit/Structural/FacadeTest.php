<?php

declare(strict_types=1);

namespace Tests\Unit\Structural;

use App\Structural\Facade\Computer;
use App\Structural\Facade\ComputerFacade;

it('can turn on computer', function () {
    $computer = new ComputerFacade(new Computer());

    expect($computer->turnOn())
        ->toBe([
            'Ouch!',
            'Beep beep!',
            'Loading..',
            'Ready to be used!',
        ]);
});

it('can turn off computer', function () {
    $computer = new ComputerFacade(new Computer());

    expect($computer->turnOff())
        ->toBe([
            'Bup bup bup buzzzz!',
            'Haaah!',
            'Zzzzz',
        ]);
});
