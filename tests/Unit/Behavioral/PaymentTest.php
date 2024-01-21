<?php

declare(strict_types=1);

namespace Tests\Unit\Behavioral;

use App\Behavioral\Strategy\Payment\Enum\CustomerSegment;
use App\Behavioral\Strategy\Payment\Enum\LoyaltyTier;
use App\Behavioral\Strategy\Payment\Enum\PaymentMethod;
use App\Behavioral\Strategy\Payment\Enum\PromotionalPeriod;
use App\Behavioral\Strategy\Payment\Enum\Subscription;
use App\Behavioral\Strategy\Payment\Model\Client;
use App\Behavioral\Strategy\Payment\Service\PaymentService;
use App\Behavioral\Strategy\Payment\Service\TransactionService;

it('should apply loyalty discount based on client tier', function (LoyaltyTier $loyaltyTier, float $amount, float $finalAmount) {
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

it('should apply purchase history discount when it is greater than 5', function (int $purchaseHistory, float $amount, float $finalAmount) {
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

it('should apply discount based on the total amount', function (float $amount, float $finalAmount) {
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

it('should apply a discount based on a payment method', function (PaymentMethod $paymentMethod, float $amount, float $finalAmount) {
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

it('should apply a discount with referral code', function (?string $referralCode, float $amount, float $finalAmount) {
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

it('should apply discount during holiday sale', function (?PromotionalPeriod $promotionalPeriod, float $amount, float $finalAmount) {
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
        'promotionalPeriod' => PromotionalPeriod::HOLIDAY_SALE,
        'amount' => 100,
        'finalAmount' => 80,
    ],
]);

it('should apply discount for the first purchase', function (bool $isFirstPurchase, float $amount, float $finalAmount) {
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

it('should apply discount based on the type of subscription', function (?Subscription $subscription, float $amount, float $finalAmount) {
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

it('should apply loyalty, purchase history, payment method, referral code, subscription, customer segment', function () {
    $paymentService = new PaymentService(new TransactionService());
    $client = new Client(
        loyaltyTier: LoyaltyTier::GOLD,
        paymentMethod: PaymentMethod::CREDIT_CARD,
        purchaseHistory: 50,
        referralCode: 'code',
        promotionalPeriod: PromotionalPeriod::HOLIDAY_SALE,
        isFirstPurchase: false,
        subscription: Subscription::PREMIUM,
        customerSegment: CustomerSegment::VIP,
    );

    $transaction = $paymentService->resolvePayment($client, 1000);

    expect($transaction->amount())->toBe(308.0955);
});
