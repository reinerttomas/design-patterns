<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment\Processor;

use App\Behavioral\Strategy\Payment\Model\Client;

class ReferralDiscountProcessor implements PaymentProcessor
{
    public function supports(Client $client): bool
    {
        return $client->referralCode() !== null;
    }

    public function handle(Client $client, float $amount): float
    {
        if ($client->referralCode() === null) {
            throw new \InvalidArgumentException('Referral code is required.');
        }

        return $amount * 0.8; // 20% discount with referral code
    }
}
