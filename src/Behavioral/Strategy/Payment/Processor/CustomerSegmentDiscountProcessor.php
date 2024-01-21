<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment\Processor;

use App\Behavioral\Strategy\Payment\Model\Client;

class CustomerSegmentDiscountProcessor implements PaymentProcessor
{
    public function supports(Client $client): bool
    {
        return $client->customerSegment() !== null;
    }

    public function handle(Client $client, float $amount): float
    {
        if ($client->customerSegment() === null) {
            throw new \InvalidArgumentException('CustomerSegment is required.');
        }

        if ($client->customerSegment()->isVIP()) {
            return $amount * 0.85; // 15% discount for VIP customers
        }

        if ($client->customerSegment()->isCorporate()) {
            return $amount * 0.88; // 12% discount for corporate customers
        }

        return $amount;
    }
}
