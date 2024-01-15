<?php

declare(strict_types=1);

namespace App\Behavioral\Memento;

class EditorMemento
{
    public function __construct(private string $content)
    {
    }

    public function content(): string
    {
        return $this->content;
    }
}
