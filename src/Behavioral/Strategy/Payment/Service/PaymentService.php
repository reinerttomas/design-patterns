<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment\Service;

use App\Behavioral\Strategy\Payment\Enum\CustomerSegment;
use App\Behavioral\Strategy\Payment\Enum\LoyaltyTier;
use App\Behavioral\Strategy\Payment\Enum\PaymentMethod;
use App\Behavioral\Strategy\Payment\Enum\PromotionalPeriod;
use App\Behavioral\Strategy\Payment\Enum\Subscription;
use App\Behavioral\Strategy\Payment\Model\Client;
use App\Behavioral\Strategy\Payment\Model\Transaction;

class PaymentService
{
    public function __construct(private TransactionService $transactionService)
    {
    }

    public function resolvePayment(Client $client, float $amount): Transaction
    {
        $finalAmount = $this->applyLoyaltyDiscount($amount, $client->loyaltyTier());
        $finalAmount = $this->applyPurchaseHistoryDiscount($finalAmount, $client->purchaseHistory());
        $finalAmount = $this->applyOrderTotalDiscount($finalAmount, $amount);
        $finalAmount = $this->applyPaymentMethodDiscount($finalAmount, $client->paymentMethod());
        $finalAmount = $this->applyReferralDiscount($finalAmount, $client->referralCode());
        $finalAmount = $this->applyPromotionalDiscount($finalAmount, $client->promotionalPeriod());
        $finalAmount = $this->applyFirstPurchaseDiscount($finalAmount, $client->isFirstPurchase());
        $finalAmount = $this->applySubscriptionDiscount($finalAmount, $client->subscription());
        $finalAmount = $this->applyCustomerSegmentDiscount($finalAmount, $client->customerSegment());

        return $this->transactionService->create($client, $finalAmount);
    }

    private function applyLoyaltyDiscount(float $amount, LoyaltyTier $loyaltyTier): float
    {
        if ($loyaltyTier->isGold()) {
            return $amount * 0.9; // 10% discount for Gold tier
        }

        if ($loyaltyTier->isSilver()) {
            return $amount * 0.95; // 5% discount for Silver tier
        }

        return $amount;
    }

    private function applyPurchaseHistoryDiscount(float $amount, int $purchaseHistory): float
    {
        if ($purchaseHistory > 5) {
            return $amount * 0.92; // 8% discount for loyal customers
        }

        return $amount;
    }

    private function applyOrderTotalDiscount(float $amount, float $orderAmount): float
    {
        if ($orderAmount > 1000) {
            return $amount * 0.85; // 15% discount for large orders
        }

        if ($orderAmount > 500) {
            return $amount * 0.95; // 5% discount for medium-sized orders
        }

        return $amount;
    }

    private function applyPaymentMethodDiscount(float $amount, PaymentMethod $paymentMethod): float
    {
        if ($paymentMethod->isCreditCard()) {
            return $amount * 0.9; // 10% discount for credit card payments
        }

        if ($paymentMethod->isDigitalWallet()) {
            return $amount * 0.93; // 7% discount for digital wallet payments
        }

        return $amount;
    }

    private function applyReferralDiscount(float $amount, ?string $referralCode): float
    {
        if ($referralCode !== null) {
            return $amount * 0.8; // 20% discount with referral code
        }

        return $amount;
    }

    private function applyPromotionalDiscount(float $amount, ?PromotionalPeriod $promotionalPeriod): float
    {
        if ($promotionalPeriod !== null) {
            if ($promotionalPeriod->isHolidaySale()) {
                return $amount * 0.8; // 20% discount during holiday sale
            }
        }

        return $amount;
    }

    private function applyFirstPurchaseDiscount(float $amount, bool $isFirstPurchase): float
    {
        if ($isFirstPurchase) {
            return $amount * 0.85; // 15% discount for the first purchase
        }

        return $amount;
    }

    public function applySubscriptionDiscount(float $amount, ?Subscription $subscription): float
    {
        if ($subscription !== null) {
            if ($subscription->isPremium()) {
                return $amount * 0.8; // 20% discount for premium subscriptions
            } elseif ($subscription->isStandard()) {
                return $amount * 0.9; // 10% discount for standard subscriptions
            }
        }

        return $amount;
    }

    private function applyCustomerSegmentDiscount(float $amount, ?CustomerSegment $customerSegment): float
    {
        if ($customerSegment !== null) {
            if ($customerSegment->isVIP()) {
                return $amount * 0.85; // 15% discount for VIP customers
            } elseif ($customerSegment->isCorporate()) {
                return $amount * 0.88; // 12% discount for corporate customers
            }
        }

        return $amount;
    }
}
