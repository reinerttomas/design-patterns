<?php

declare(strict_types=1);

namespace App\SOLID\SRP\Printer;

use App\SOLID\SRP\BlogPost;

interface Printable
{
    public function print(BlogPost $blogPost): string;
}
