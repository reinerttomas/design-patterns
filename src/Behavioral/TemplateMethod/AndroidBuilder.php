<?php

declare(strict_types=1);

namespace App\Behavioral\TemplateMethod;

class AndroidBuilder extends Builder
{
    public function test(): void
    {
        $this->results[] = 'Running android tests';
    }

    public function lint(): void
    {
        $this->results[] = 'Linting the android code';
    }

    public function assemble(): void
    {
        $this->results[] = 'Assembling the android build';
    }

    public function deploy(): void
    {
        $this->results[] = 'Deploying android build to server';
    }
}
