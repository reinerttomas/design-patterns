<?php

declare(strict_types=1);

namespace App\Structural\Bridge\Theme;

class AquaTheme implements Theme
{
    public function color(): string
    {
        return 'aqua theme';
    }
}
