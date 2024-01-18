<?php

declare(strict_types=1);

namespace App\Behavioral\TemplateMethod;

abstract class Builder
{
    /**
     * @var array<string>
     */
    protected array $results = [];

    /**
     * @return array<string>
     */
    public function results(): array
    {
        return $this->results;
    }

    // Template method
    final public function build(): void
    {
        $this->test();
        $this->lint();
        $this->assemble();
        $this->deploy();
    }

    abstract public function test(): void;

    abstract public function lint(): void;

    abstract public function assemble(): void;

    abstract public function deploy(): void;
}
