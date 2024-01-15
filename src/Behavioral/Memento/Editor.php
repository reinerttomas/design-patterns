<?php

declare(strict_types=1);

namespace App\Behavioral\Memento;

class Editor
{
    public function __construct(private string $content = '')
    {
    }

    public function type(string $words): void
    {
        if (strlen($this->content) === 0) {
            $this->content = $words;
        } else {
            $this->content .= ' ' . $words;
        }
    }

    public function content(): string
    {
        return $this->content;
    }

    public function save(): EditorMemento
    {
        return new EditorMemento($this->content);
    }

    public function restore(EditorMemento $memento): void
    {
        $this->content = $memento->content();
    }
}
