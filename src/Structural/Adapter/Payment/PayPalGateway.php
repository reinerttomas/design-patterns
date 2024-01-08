<?php

declare(strict_types=1);

namespace App\Structural\Adapter\Payment;

class PayPalGateway implements PaymentGateway
{
    public function __construct(private PayPalApi $payPalApi)
    {
    }

    public function processPayment(float $amount): string
    {
        return $this->payPalApi->sendPayment($amount);
    }
}
