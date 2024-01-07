<?php

declare(strict_types=1);

namespace App\Structural\Adapter;

class AfricanLion implements Lion
{
    public function roar(): string
    {
        return 'African lion roaring';
    }
}
