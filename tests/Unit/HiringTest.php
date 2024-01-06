<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Creational\FactoryMethod\DevelopmentManager;
use App\Creational\FactoryMethod\MarketingManager;

it('take developer interview', function () {
    $devManager = new DevelopmentManager();

    expect($devManager->takeInterview())
        ->toBe('Asking about design patterns!');
});

it('take marketing interview', function () {
    $marketingManager = new MarketingManager();

    expect($marketingManager->takeInterview())
        ->toBe('Asking about community building!');
});
