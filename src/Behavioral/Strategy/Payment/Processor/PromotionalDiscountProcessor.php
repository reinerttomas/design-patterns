<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment\Processor;

use App\Behavioral\Strategy\Payment\Model\Client;

class PromotionalDiscountProcessor implements PaymentProcessor
{
    public function supports(Client $client): bool
    {
        return $client->promotionalPeriod() !== null;
    }

    public function handle(Client $client, float $amount): float
    {
        if ($client->promotionalPeriod() === null) {
            throw new \InvalidArgumentException('Client promotional period is required.');
        }

        if ($client->promotionalPeriod()->isHolidaySale()) {
            return $amount * 0.8; // 20% discount during holiday sale
        }

        return $amount;
    }
}
