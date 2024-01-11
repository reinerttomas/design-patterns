<?php

declare(strict_types=1);

namespace App\Behavioral\Iterator;

use Countable;
use Iterator;

/**
 * @implements  Iterator<int, RadioStation>
 */
class StationList implements Countable, Iterator
{
    /** @var array<RadioStation> */
    private array $stations = [];
    private int $key = 0;

    public function addStation(RadioStation $station): void
    {
        $this->stations[] = $station;
    }

    public function removeStation(RadioStation $stationToRemove): void
    {
        $this->stations = array_filter(
            $this->stations, fn (RadioStation $station) => $station !== $stationToRemove
        );
    }

    public function count(): int
    {
        return count($this->stations);
    }

    public function current(): RadioStation
    {
        return $this->stations[$this->key];
    }

    public function next(): void
    {
        $this->key++;
    }

    public function key(): int
    {
        return $this->key;
    }

    public function valid(): bool
    {
        return isset($this->stations[$this->key]);
    }

    public function rewind(): void
    {
        $this->key = 0;
    }
}
