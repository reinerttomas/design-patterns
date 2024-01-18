<?php

declare(strict_types=1);

namespace Tests\Unit\Behavioral;

use App\Behavioral\TemplateMethod\AndroidBuilder;
use App\Behavioral\TemplateMethod\IosBuilder;

it('can build android app', function () {
    $androidBuilder = new AndroidBuilder();
    $androidBuilder->build();

    expect($androidBuilder->results())
        ->toBe([
            'Running android tests',
            'Linting the android code',
            'Assembling the android build',
            'Deploying android build to server',
        ]);
});

it('can build ios app', function () {
    $androidBuilder = new IosBuilder();
    $androidBuilder->build();

    expect($androidBuilder->results())
        ->toBe([
            'Running ios tests',
            'Linting the ios code',
            'Assembling the ios build',
            'Deploying ios build to server',
        ]);
});
