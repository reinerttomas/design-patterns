<?php

declare(strict_types=1);

namespace App\Structural\Flyweight;

use App\Structural\Flyweight\Tea\Tea;

class TeaShop
{
    /**
     * @var array<int, Tea>
     */
    private array $orders = [];

    public function __construct(private TeaMaker $teaMaker)
    {
    }

    public function orderCount(): int
    {
        return count($this->orders);
    }

    public function takeOrder(string $teaType, int $table): void
    {
        $this->orders[$table] = $this->teaMaker->make($teaType);
    }

    /**
     * @return array<string>
     */
    public function serve(): array
    {
        $result = [];

        foreach ($this->orders as $table => $tea) {
            $result[] = 'Serving tea to table# ' . $table;
        }

        return $result;
    }
}
