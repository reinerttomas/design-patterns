<?php

declare(strict_types=1);

namespace Tests\Unit\Structural\Adapter;

use App\Structural\Adapter\Payment\Api\PayPalApi;
use App\Structural\Adapter\Payment\Api\StripeApi;
use App\Structural\Adapter\Payment\Gateway\PayPalGateway;
use App\Structural\Adapter\Payment\Gateway\StripeGateway;
use App\Structural\Adapter\Payment\PaymentService;

it('can process payment via PayPal', function () {
    $payPalApi = new PayPalApi();
    $payPalGateway = new PayPalGateway($payPalApi);
    $paymentService = new PaymentService($payPalGateway);

    expect($paymentService->processPayment(99.99))
        ->toBe('paypal: ' . 99.99);
});

it('can process payment via Stripe', function () {
    $stripeApi = new StripeApi();
    $stripeGateway = new StripeGateway($stripeApi);
    $paymentService = new PaymentService($stripeGateway);

    expect($paymentService->processPayment(59.99))
        ->toBe('stripe: ' . 59.99);
});
