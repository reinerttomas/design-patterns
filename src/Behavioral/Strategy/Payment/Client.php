<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment;

class Client
{
    public function __construct(
        private LoyaltyTier $loyaltyTier,
        private PaymentMethod $paymentMethod,
        private int $purchaseHistory = 0,
        private ?string $referralCode = null,
        private ?string $promotionalPeriod = null,
        private bool $isFirstPurchase = false,
        private ?Subscription $subscription = null,
        private ?CustomerSegment $customerSegment = null,
    ) {
    }

    public function loyaltyTier(): LoyaltyTier
    {
        return $this->loyaltyTier;
    }

    public function paymentMethod(): PaymentMethod
    {
        return $this->paymentMethod;
    }

    public function purchaseHistory(): int
    {
        return $this->purchaseHistory;
    }

    public function referralCode(): ?string
    {
        return $this->referralCode;
    }

    public function promotionalPeriod(): ?string
    {
        return $this->promotionalPeriod;
    }

    public function isFirstPurchase(): bool
    {
        return $this->isFirstPurchase;
    }

    public function subscription(): ?Subscription
    {
        return $this->subscription;
    }

    public function customerSegment(): ?CustomerSegment
    {
        return $this->customerSegment;
    }
}
