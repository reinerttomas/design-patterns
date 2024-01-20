<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Sorting;

/**
 * @implements Sortable<string|int>
 */
class QuickSort implements Sortable
{
    public function sort(array $data): array
    {
        return ['Sorting using quick sort'];
    }
}
