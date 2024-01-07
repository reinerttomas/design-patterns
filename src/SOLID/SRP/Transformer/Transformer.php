<?php

declare(strict_types=1);

namespace App\SOLID\SRP\Transformer;

use App\SOLID\SRP\BlogPost;

interface Transformer
{
    /**
     * @return non-empty-array<string, mixed>
     */
    public function toArray(BlogPost $blogPost): array;
}
