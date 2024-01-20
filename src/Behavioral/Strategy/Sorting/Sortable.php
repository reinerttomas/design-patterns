<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Sorting;

/**
 * @template T
 */
interface Sortable
{
    /**
     * @param  array<T>  $data
     * @return array<T>
     */
    public function sort(array $data): array;
}
