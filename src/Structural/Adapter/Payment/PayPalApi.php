<?php

declare(strict_types=1);

namespace App\Structural\Adapter\Payment;

class PayPalApi
{
    public function sendPayment(float $amount): string
    {
        return 'paypal: ' . $amount;
    }
}
