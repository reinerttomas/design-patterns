<?php

declare(strict_types=1);

namespace App\Structural\Bridge\WebPage;

use App\Structural\Bridge\Theme\Theme;

interface WebPage
{
    public function __construct(Theme $theme);

    public function content(): string;
}
