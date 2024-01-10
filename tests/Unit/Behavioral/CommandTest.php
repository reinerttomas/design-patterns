<?php

declare(strict_types=1);

namespace Tests\Unit\Behavioral;

use App\Behavioral\Command\Bulb;
use App\Behavioral\Command\RemoteControl;
use App\Behavioral\Command\TurnOff;
use App\Behavioral\Command\TurnOn;

it('can turn on bulb', function () {
    $bulb = new Bulb();
    $turnOn = new TurnOn($bulb);
    $remoteControl = new RemoteControl();

    expect($remoteControl->submit($turnOn))
        ->toBe('Bulb has been lit!');
});

it('can turn off bulb', function () {
    $bulb = new Bulb();
    $turnOff = new TurnOff($bulb);
    $remoteControl = new RemoteControl();

    expect($remoteControl->submit($turnOff))
        ->toBe('Darkness!');
});
