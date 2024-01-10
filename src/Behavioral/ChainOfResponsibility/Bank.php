<?php

declare(strict_types=1);

namespace App\Behavioral\ChainOfResponsibility;

class Bank extends Account
{
    public function whoAmI(): string
    {
        return 'Bank';
    }
}
