<?php

declare(strict_types=1);

namespace App\Structural\Adapter;

class AsianLion implements Lion
{
    public function roar(): string
    {
        return 'Asian lion roaring';
    }
}
