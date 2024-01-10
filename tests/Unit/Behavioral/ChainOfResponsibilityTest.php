<?php

declare(strict_types=1);

namespace Tests\Unit\Behavioral\ChainOfResponsibility;

use App\Behavioral\ChainOfResponsibility\Bank;
use App\Behavioral\ChainOfResponsibility\Bitcoin;
use App\Behavioral\ChainOfResponsibility\Paypal;

it('can pay via bitcoind', function () {
    $bank = new Bank(100);
    $paypal = new Paypal(200);
    $bitcoin = new Bitcoin(300);

    $bank->setNext($paypal);
    $paypal->setNext($bitcoin);

    expect($bank->pay(259))
        ->toBe('Paid 259 using Bitcoin');
});
