<?php

declare(strict_types=1);

namespace App\SOLID\SRP\Transformer;

use App\SOLID\SRP\BlogPost;

class BlogPostTransformer implements Transformer
{
    /**
     * @return array{author: string, title: string, content: string, createdAt: string}
     */
    public function toArray(BlogPost $blogPost): array
    {
        return [
            'author' => $blogPost->author()->fullName(),
            'title' => $blogPost->title(),
            'content' => $blogPost->content(),
            'createdAt' => $blogPost->createdAt()->format('Y-m-d H:i:s'),
        ];
    }
}
