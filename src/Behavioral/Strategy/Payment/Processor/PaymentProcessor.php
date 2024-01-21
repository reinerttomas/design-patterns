<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment\Processor;

use App\Behavioral\Strategy\Payment\Model\Client;

interface PaymentProcessor
{
    public function handle(Client $client, float $amount): float;
}
