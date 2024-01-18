<?php

declare(strict_types=1);

namespace App\Behavioral\TemplateMethod;

class IosBuilder extends Builder
{
    public function test(): void
    {
        $this->results[] = 'Running ios tests';
    }

    public function lint(): void
    {
        $this->results[] = 'Linting the ios code';
    }

    public function assemble(): void
    {
        $this->results[] = 'Assembling the ios build';
    }

    public function deploy(): void
    {
        $this->results[] = 'Deploying ios build to server';
    }
}
