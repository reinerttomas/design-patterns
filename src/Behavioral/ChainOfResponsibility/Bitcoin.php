<?php

declare(strict_types=1);

namespace App\Behavioral\ChainOfResponsibility;

class Bitcoin extends Account
{
    public function whoAmI(): string
    {
        return 'Bitcoin';
    }
}
