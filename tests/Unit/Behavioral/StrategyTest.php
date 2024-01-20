<?php

declare(strict_types=1);

namespace Tests\Unit\Behavioral;

use App\Behavioral\Strategy\Sorting\BubbleSort;
use App\Behavioral\Strategy\Sorting\QuickSort;
use App\Behavioral\Strategy\Sorting\Sorter;

it('can sort using bubble sort', function () {
    $sorter = new Sorter(
        new BubbleSort(),
        new QuickSort(),
    );

    $data = [2, 1, 3, 4];

    expect($sorter->sort($data))->toBe(['Sorting using bubble sort']);
});

it('can sort using quick sort', function () {
    $sorter = new Sorter(
        new BubbleSort(),
        new QuickSort(),
    );

    $data = [1, 4, 3, 2, 8, 10, 5, 6, 9, 7];

    expect($sorter->sort($data))->toBe(['Sorting using quick sort']);
});
