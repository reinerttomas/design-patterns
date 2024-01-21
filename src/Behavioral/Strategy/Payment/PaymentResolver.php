<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment;

interface PaymentResolver
{
    public function supports(Client $client): bool;

    public function handle(Client $client, float $amount): float;
}
