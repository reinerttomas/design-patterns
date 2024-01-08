<?php

declare(strict_types=1);

namespace Tests\Unit\Structural;

use App\Structural\Composite\Designer;
use App\Structural\Composite\Developer;
use App\Structural\Composite\Organization;

it('can add employees', function () {
    $developer = new Developer('John', 10000);
    $designer = new Designer('John', 20000);

    $organization = new Organization();
    $organization->addEmployee($developer);
    $organization->addEmployee($designer);

    expect($organization->getEmployees())
        ->toHaveCount(2)
        ->and($organization->getNetSalaries())
        ->toBe(30000.0);
});
