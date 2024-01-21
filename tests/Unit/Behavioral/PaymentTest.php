<?php

declare(strict_types=1);

namespace Tests\Unit\Behavioral;

use App\Behavioral\Strategy\Payment\Client;
use App\Behavioral\Strategy\Payment\LoyaltyTier;
use App\Behavioral\Strategy\Payment\PaymentMethod;
use App\Behavioral\Strategy\Payment\PaymentService;
use App\Behavioral\Strategy\Payment\Subscription;
use App\Behavioral\Strategy\Payment\TransactionService;

it('should provide a loyalty discount based on client tier', function (LoyaltyTier $loyaltyTier, float $amount, float $finalAmount) {
    $paymentService = new PaymentService(new TransactionService());
    $client = new Client(
        loyaltyTier: $loyaltyTier,
        paymentMethod: PaymentMethod::CASH,
    );

    $transaction = $paymentService->resolvePayment($client, $amount);

    expect($transaction->amount())->toBe($finalAmount);
})->with([
    [
        'bronze' => LoyaltyTier::BRONZE,
        'amount' => 100,
        'finalAmount' => 100,
    ],
    [
        'silver' => LoyaltyTier::SILVER,
        'amount' => 100,
        'finalAmount' => 95,
    ],
    [
        'gold' => LoyaltyTier::GOLD,
        'amount' => 100,
        'finalAmount' => 90,
    ],
]);

it('should provide an extra 8% discount when a purchase history is greater than 5', function (int $purchaseHistory, float $amount, float $finalAmount) {
    $paymentService = new PaymentService(new TransactionService());
    $client = new Client(
        loyaltyTier: LoyaltyTier::BRONZE,
        paymentMethod: PaymentMethod::CASH,
        purchaseHistory: $purchaseHistory,
    );

    $transaction = $paymentService->resolvePayment($client, $amount);

    expect($transaction->amount())->toBe($finalAmount);
})->with([
    [
        'purchaseHistory' => 5,
        'amount' => 100,
        'finalAmount' => 100,
    ],
    [
        'purchaseHistory' => 6,
        'amount' => 100,
        'finalAmount' => 92,
    ],
]);

it('should provide a discount based on the total amount', function (float $amount, float $finalAmount) {
    $paymentService = new PaymentService(new TransactionService());
    $client = new Client(
        loyaltyTier: LoyaltyTier::BRONZE,
        paymentMethod: PaymentMethod::CASH,
    );

    $transaction = $paymentService->resolvePayment($client, $amount);

    expect($transaction->amount())->toBe($finalAmount);
})->with([
    [
        'amount' => 500,
        'finalAmount' => 500,
    ],
    [
        'amount' => 501,
        'finalAmount' => 475.95,
    ],
    [
        'amount' => 1000,
        'finalAmount' => 950,
    ],
    [
        'amount' => 1001,
        'finalAmount' => 850.85,
    ],
]);

it('should provide a discount based on a payment method', function (PaymentMethod $paymentMethod, float $amount, float $finalAmount) {
    $paymentService = new PaymentService(new TransactionService());
    $client = new Client(
        loyaltyTier: LoyaltyTier::BRONZE,
        paymentMethod: $paymentMethod,
    );

    $transaction = $paymentService->resolvePayment($client, $amount);

    expect($transaction->amount())->toBe($finalAmount);
})->with([
    [
        'paymentMethod' => PaymentMethod::CASH,
        'amount' => 100,
        'finalAmount' => 100,
    ],
    [
        'paymentMethod' => PaymentMethod::CREDIT_CARD,
        'amount' => 100,
        'finalAmount' => 90,
    ],
    [
        'paymentMethod' => PaymentMethod::DIGITAL_WALLET,
        'amount' => 100,
        'finalAmount' => 93,
    ],
]);

it('should provide 20% discount with referral code', function (?string $referralCode, float $amount, float $finalAmount) {
    $paymentService = new PaymentService(new TransactionService());
    $client = new Client(
        loyaltyTier: LoyaltyTier::BRONZE,
        paymentMethod: PaymentMethod::CASH,
        referralCode: $referralCode,
    );

    $transaction = $paymentService->resolvePayment($client, $amount);

    expect($transaction->amount())->toBe($finalAmount);
})->with([
    [
        'referralCode' => null,
        'amount' => 100,
        'finalAmount' => 100,
    ],
    [
        'referralCode' => 'code',
        'amount' => 100,
        'finalAmount' => 80,
    ],
]);

it('should provide 20% discount during holiday sale', function (?string $promotionalPeriod, float $amount, float $finalAmount) {
    $paymentService = new PaymentService(new TransactionService());
    $client = new Client(
        loyaltyTier: LoyaltyTier::BRONZE,
        paymentMethod: PaymentMethod::CASH,
        promotionalPeriod: $promotionalPeriod,
    );

    $transaction = $paymentService->resolvePayment($client, $amount);

    expect($transaction->amount())->toBe($finalAmount);
})->with([
    [
        'promotionalPeriod' => null,
        'amount' => 100,
        'finalAmount' => 100,
    ],
    [
        'promotionalPeriod' => 'HolidaySale',
        'amount' => 100,
        'finalAmount' => 80,
    ],
]);

it('should provide 15% discount for the first purchase', function (bool $isFirstPurchase, float $amount, float $finalAmount) {
    $paymentService = new PaymentService(new TransactionService());
    $client = new Client(
        loyaltyTier: LoyaltyTier::BRONZE,
        paymentMethod: PaymentMethod::CASH,
        isFirstPurchase: $isFirstPurchase,
    );

    $transaction = $paymentService->resolvePayment($client, $amount);

    expect($transaction->amount())->toBe($finalAmount);
})->with([
    [
        'isFirstPurchase' => false,
        'amount' => 100,
        'finalAmount' => 100,
    ],
    [
        'isFirstPurchase' => true,
        'amount' => 100,
        'finalAmount' => 85,
    ],
]);

it('should provide discount based on the type of subscription', function (?Subscription $subscription, float $amount, float $finalAmount) {
    $paymentService = new PaymentService(new TransactionService());
    $client = new Client(
        loyaltyTier: LoyaltyTier::BRONZE,
        paymentMethod: PaymentMethod::CASH,
        subscription: $subscription,
    );

    $transaction = $paymentService->resolvePayment($client, $amount);

    expect($transaction->amount())->toBe($finalAmount);
})->with([
    [
        'subscription' => null,
        'amount' => 100,
        'finalAmount' => 100,
    ],
    [
        'subscription' => Subscription::STANDARD,
        'amount' => 100,
        'finalAmount' => 90,
    ],
    [
        'subscription' => Subscription::PREMIUM,
        'amount' => 100,
        'finalAmount' => 80,
    ],
]);
