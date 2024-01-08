<?php

declare(strict_types=1);

namespace App\Structural\Adapter\Hunter;

class AsianLion implements Lion
{
    public function roar(): string
    {
        return 'Asian lion roaring';
    }
}
