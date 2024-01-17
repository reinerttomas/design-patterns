<?php

declare(strict_types=1);

namespace Tests\Unit\Behavioral;

use App\Behavioral\State\Phone;
use App\Behavioral\State\PhoneStateCalling;
use App\Behavioral\State\PhoneStateIdle;
use App\Behavioral\State\PhoneStatePickedUp;

it('can pickup and dial call.', function () {
    $phone = new Phone();
    expect($phone->state())->toBeInstanceOf(PhoneStateIdle::class);

    $phone->pickUp();
    expect($phone->state())->toBeInstanceOf(PhoneStatePickedUp::class);

    $phone->dial();
    expect($phone->state())->toBeInstanceOf(PhoneStateCalling::class);
});
