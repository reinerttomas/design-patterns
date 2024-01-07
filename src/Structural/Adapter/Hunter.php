<?php

declare(strict_types=1);

namespace App\Structural\Adapter;

class Hunter
{
    public function hunt(Lion $lion): string
    {
        return $lion->roar();
    }
}
