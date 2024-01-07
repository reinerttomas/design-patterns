<?php

declare(strict_types=1);

namespace App\Structural\Bridge\Theme;

class LightTheme implements Theme
{
    public function color(): string
    {
        return 'light theme';
    }
}
