<?php

declare(strict_types=1);

namespace App\Structural\Bridge\Theme;

class DarkTheme implements Theme
{
    public function color(): string
    {
        return 'dark theme';
    }
}
