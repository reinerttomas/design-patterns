<?php

declare(strict_types=1);

namespace App\Structural\Adapter\Payment\Gateway;

interface PaymentGateway
{
    public function processPayment(float $amount): string;
}
