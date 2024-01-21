<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment\Processor;

use App\Behavioral\Strategy\Payment\Model\Client;

class LoyaltyDiscountProcessor implements PaymentProcessor
{
    public function supports(Client $client): bool
    {
        return $client->loyaltyTier()->isGold() || $client->loyaltyTier()->isSilver();
    }

    public function handle(Client $client, float $amount): float
    {
        if ($client->loyaltyTier()->isGold()) {
            return $amount * 0.9; // 10% discount for Gold tier
        }

        if ($client->loyaltyTier()->isSilver()) {
            return $amount * 0.95; // 5% discount for Silver tier
        }

        return $amount;
    }
}
