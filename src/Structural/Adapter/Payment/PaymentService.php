<?php

declare(strict_types=1);

namespace App\Structural\Adapter\Payment;

use App\Structural\Adapter\Payment\Gateway\PaymentGateway;

class PaymentService
{
    public function __construct(private PaymentGateway $paymentGateway)
    {
    }

    public function processPayment(float $amount): string
    {
        return $this->paymentGateway->processPayment($amount);
    }
}
