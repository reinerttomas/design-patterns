<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment\Processor;

use App\Behavioral\Strategy\Payment\Model\Client;

class PaymentMethodDiscountProcessor implements PaymentProcessor
{
    public function supports(Client $client): bool
    {
        return $client->paymentMethod()->isCreditCard() || $client->paymentMethod()->isDigitalWallet();
    }

    public function handle(Client $client, float $amount): float
    {
        if ($client->paymentMethod()->isCreditCard()) {
            return $amount * 0.9; // 10% discount for credit card payments
        }

        if ($client->paymentMethod()->isDigitalWallet()) {
            return $amount * 0.93; // 7% discount for digital wallet payments
        }

        return $amount;
    }
}
