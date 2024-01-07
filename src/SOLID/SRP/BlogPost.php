<?php

declare(strict_types=1);

namespace App\SOLID\SRP;

use DateTime;

class BlogPost
{
    public function __construct(
        private Author $author,
        private string $title,
        private string $content,
        private DateTime $createdAt,
    ) {
    }

    public function author(): Author
    {
        return $this->author;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function content(): string
    {
        return $this->content;
    }

    public function createdAt(): DateTime
    {
        return $this->createdAt;
    }
}
