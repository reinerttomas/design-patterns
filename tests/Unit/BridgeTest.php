<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Structural\Bridge\Theme\AquaTheme;
use App\Structural\Bridge\Theme\DarkTheme;
use App\Structural\Bridge\Theme\LightTheme;
use App\Structural\Bridge\WebPage\About;
use App\Structural\Bridge\WebPage\Carrier;

it('can use light theme', function () {
    $lightTheme = new LightTheme();

    $about = new About($lightTheme);
    $carrier = new Carrier($lightTheme);

    expect($about->content())
        ->toBe('About page in light theme')
        ->and($carrier->content())
        ->toBe('Carrier page in light theme');
});

it('can use dark theme', function () {
    $darkTheme = new DarkTheme();

    $about = new About($darkTheme);
    $carrier = new Carrier($darkTheme);

    expect($about->content())
        ->toBe('About page in dark theme')
        ->and($carrier->content())
        ->toBe('Carrier page in dark theme');
});

it('can use aqua theme', function () {
    $aquaTheme = new AquaTheme();

    $about = new About($aquaTheme);
    $carrier = new Carrier($aquaTheme);

    expect($about->content())
        ->toBe('About page in aqua theme')
        ->and($carrier->content())
        ->toBe('Carrier page in aqua theme');
});
