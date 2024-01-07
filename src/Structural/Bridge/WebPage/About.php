<?php

declare(strict_types=1);

namespace App\Structural\Bridge\WebPage;

use App\Structural\Bridge\Theme\Theme;

class About implements WebPage
{
    public function __construct(
        private readonly Theme $theme
    ) {
    }

    public function content(): string
    {
        return 'About page in ' . $this->theme->color();
    }
}
