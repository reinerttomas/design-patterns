<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment\Model;

use App\Behavioral\Strategy\Payment\Enum\CustomerSegment;
use App\Behavioral\Strategy\Payment\Enum\LoyaltyTier;
use App\Behavioral\Strategy\Payment\Enum\PaymentMethod;
use App\Behavioral\Strategy\Payment\Enum\PromotionalPeriod;
use App\Behavioral\Strategy\Payment\Enum\Subscription;

class Client
{
    public function __construct(
        private LoyaltyTier $loyaltyTier,
        private PaymentMethod $paymentMethod,
        private int $purchaseHistory = 0,
        private ?string $referralCode = null,
        private ?PromotionalPeriod $promotionalPeriod = null,
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

    public function promotionalPeriod(): ?PromotionalPeriod
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
