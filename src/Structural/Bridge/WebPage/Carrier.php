<?php

declare(strict_types=1);

namespace App\Structural\Bridge\WebPage;

use App\Structural\Bridge\Theme\Theme;

class Carrier implements WebPage
{
    public function __construct(
        private readonly Theme $theme
    ) {
    }

    public function content(): string
    {
        return 'Carrier page in ' . $this->theme->color();
    }
}
