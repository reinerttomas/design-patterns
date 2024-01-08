<?php

declare(strict_types=1);

namespace App\Structural\Adapter\Payment;

class StripeGateway implements PaymentGateway
{
    public function __construct(private StripeApi $stripeApi)
    {
    }

    public function processPayment(float $amount): string
    {
        return $this->stripeApi->charge($amount);
    }
}
