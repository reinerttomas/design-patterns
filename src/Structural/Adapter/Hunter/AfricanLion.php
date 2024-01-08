<?php

declare(strict_types=1);

namespace App\Structural\Adapter\Hunter;

class AfricanLion implements Lion
{
    public function roar(): string
    {
        return 'African lion roaring';
    }
}
