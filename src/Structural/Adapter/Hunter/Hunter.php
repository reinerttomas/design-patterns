<?php

declare(strict_types=1);

namespace App\Structural\Adapter\Hunter;

class Hunter
{
    public function hunt(Lion $lion): string
    {
        return $lion->roar();
    }
}
