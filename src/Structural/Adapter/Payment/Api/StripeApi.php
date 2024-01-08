<?php

declare(strict_types=1);

namespace App\Structural\Adapter\Payment\Api;

class StripeApi
{
    public function charge(float $amount): string
    {
        return 'stripe: ' . $amount;
    }
}
