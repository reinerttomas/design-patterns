<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Structural\Adapter\Hunter\AfricanLion;
use App\Structural\Adapter\Hunter\AsianLion;
use App\Structural\Adapter\Hunter\Hunter;
use App\Structural\Adapter\Hunter\WildDog;
use App\Structural\Adapter\Hunter\WildDogAdapter;

it('can hunt african lion', function () {
    $lion = new AfricanLion();
    $hunter = new Hunter();

    expect($hunter->hunt($lion))->toBe('African lion roaring');
});

it('can hunt asian lion', function () {
    $lion = new AsianLion();
    $hunter = new Hunter();

    expect($hunter->hunt($lion))->toBe('Asian lion roaring');
});

it('can hunt wild dog', function () {
    $wildDog = new WildDog();
    $wildDogAdapter = new WildDogAdapter($wildDog);
    $hunter = new Hunter();

    expect($hunter->hunt($wildDogAdapter))->toBe('Wild dog barking');
});
