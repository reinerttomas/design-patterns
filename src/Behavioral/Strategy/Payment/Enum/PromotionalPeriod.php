<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment\Enum;

enum PromotionalPeriod: string
{
    case HOLIDAY_SALE = 'HolidaySale';
    case CHRISTMAS_SALE = 'ChristmasSale';

    public function isHolidaySale(): bool
    {
        return $this === self::HOLIDAY_SALE;
    }
}
