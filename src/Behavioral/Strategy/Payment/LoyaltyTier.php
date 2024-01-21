<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment;

enum LoyaltyTier: string
{
    case GOLD = 'gold';
    case SILVER = 'silver';
    case BRONZE = 'bronze';

    public function isGold(): bool
    {
        return $this === self::GOLD;
    }

    public function isSilver(): bool
    {
        return $this === self::SILVER;
    }

    public function isBronze(): bool
    {
        return $this === self::BRONZE;
    }
}
