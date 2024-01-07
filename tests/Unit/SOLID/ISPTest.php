<?php

declare(strict_types=1);

namespace Tests\Unit\SOLID;

use App\SOLID\ISP\Manager;
use App\SOLID\ISP\Worker\AndroidWorker;
use App\SOLID\ISP\Worker\HumanWorker;

it('can manager manage human worker', function () {
    $manager = new Manager();
    $humanWorker = new HumanWorker();

    expect($manager->manage($humanWorker))
        ->toBe([
            'working',
            'sleeping',
        ]);
});

it('can manager manage android worker', function () {
    $manager = new Manager();
    $androidWorker = new AndroidWorker();

    expect($manager->manage($androidWorker))
        ->toBe([
            'working',
        ]);
});
