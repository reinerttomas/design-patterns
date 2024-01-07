<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Creational\Singleton\President;

it('can only be one president', function () {
    $president1 = President::instance();
    $president2 = President::instance();

    expect($president1)->toBe($president2);
});
