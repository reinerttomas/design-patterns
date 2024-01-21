<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment\Enum;

enum Subscription: string
{
    case STANDARD = 'standard';
    case PREMIUM = 'premium';

    public function isStandard(): bool
    {
        return $this === self::STANDARD;
    }

    public function isPremium(): bool
    {
        return $this === self::PREMIUM;
    }
}
