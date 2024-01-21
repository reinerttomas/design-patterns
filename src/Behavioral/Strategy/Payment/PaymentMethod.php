<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment;

enum PaymentMethod: string
{
    case CASH = 'cash';
    case CREDIT_CARD = 'credit_card';
    case DIGITAL_WALLET = 'digital_wallet';

    public function isCash(): bool
    {
        return $this === PaymentMethod::CASH;
    }

    public function isCreditCard(): bool
    {
        return $this === PaymentMethod::CREDIT_CARD;
    }

    public function isDigitalWallet(): bool
    {
        return $this === PaymentMethod::DIGITAL_WALLET;
    }
}
