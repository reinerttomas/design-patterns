<?php

declare(strict_types=1);

namespace App\Behavioral\ChainOfResponsibility;

class Paypal extends Account
{
    public function whoAmI(): string
    {
        return 'Paypal';
    }
}
