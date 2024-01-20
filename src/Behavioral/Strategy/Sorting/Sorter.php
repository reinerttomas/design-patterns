<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Sorting;

class Sorter
{
    /**
     * @param  Sortable<string|int>  $sorterSmall
     * @param  Sortable<string|int>  $sorterBig
     */
    public function __construct(
        private Sortable $sorterSmall,
        private Sortable $sorterBig,
    ) {
    }

    /**
     * @param  array<string|int>  $data
     * @return array<string|int>
     */
    public function sort(array $data): array
    {
        if (count($data) > 5) {
            return $this->sorterBig->sort($data);
        } else {
            return $this->sorterSmall->sort($data);
        }
    }
}
