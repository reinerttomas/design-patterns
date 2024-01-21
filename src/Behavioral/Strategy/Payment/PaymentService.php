<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment;

class PaymentService
{
    public function __construct(private TransactionService $transactionService)
    {
    }

    public function resolvePayment(Client $client, float $amount): Transaction
    {
        $finalAmount = $amount;

        // Condition 1: Customer Loyalty Tier
        if ($client->loyaltyTier()->isGold()) {
            $finalAmount *= 0.9;    // 10% discount for Gold tier
        } elseif ($client->loyaltyTier()->isSilver()) {
            $finalAmount *= 0.95;   // 5% discount for Silver tier
        }

        // Condition 2: Purchase History
        if ($client->purchaseHistory() > 5) {
            $finalAmount *= 0.92;   // 8% discount for loyal customers
        }

        // Condition 3: Order Total
        if ($amount > 1000) {
            $finalAmount *= 0.85;   // 15% discount for large orders
        } elseif ($amount > 500) {
            $finalAmount *= 0.95;   // 5% discount for medium-sized orders
        }

        // Condition 4: Payment Method
        if ($client->paymentMethod()->isCreditCard()) {
            $finalAmount *= 0.9;    // 10% discount for credit card payments
        } elseif ($client->paymentMethod()->isDigitalWallet()) {
            $finalAmount *= 0.93;   // 7% discount for digital wallet payments
        }

        // Condition 5: Referral Program
        if ($client->referralCode() !== null) {
            $finalAmount *= 0.8;    // 20% discount with referral code
        }

        // Condition 6: Promotional Period
        if ($client->promotionalPeriod() === 'HolidaySale') {
            $finalAmount *= 0.8;    // 20% discount during holiday sale
        }
        // Condition 7: First Purchase
        if ($client->isFirstPurchase()) {
            $finalAmount *= 0.85;   // 15% discount for the first purchase
        }

        // Condition 8: Subscription-based Discounts
        if ($client->subscription() !== null) {
            if ($client->subscription()->isPremium()) {
                $finalAmount *= 0.8;    // 20% discount for premium subscriptions
            } elseif ($client->subscription()->isStandard()) {
                $finalAmount *= 0.9;    // 10% discount for standard subscriptions
            }
        }

        // Condition 9: Customer Segment
        if ($client->customerSegment() !== null) {
            if ($client->customerSegment()->isVIP()) {
                $finalAmount *= 0.85;   // 15% discount for VIP customers
            } elseif ($client->customerSegment()->isCorporate()) {
                $finalAmount *= 0.88;   // 12% discount for corporate customers
            }
        }

        return $this->transactionService->create($client, $finalAmount);
    }
}
