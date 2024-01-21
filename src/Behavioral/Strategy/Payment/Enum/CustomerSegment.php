<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment\Enum;

enum CustomerSegment: string
{
    case VIP = 'vip';
    case CORPORATE = 'corporate';

    public function isVIP(): bool
    {
        return $this === self::VIP;
    }

    public function isCorporate(): bool
    {
        return $this === self::CORPORATE;
    }
}
