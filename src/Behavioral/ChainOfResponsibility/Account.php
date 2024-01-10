<?php

declare(strict_types=1);

namespace App\Behavioral\ChainOfResponsibility;

use Exception;

abstract class Account
{
    private ?Account $successor = null;

    final public function __construct(private int $balance = 0)
    {
    }

    abstract public function whoAmI(): string;

    public function setNext(Account $account): void
    {
        $this->successor = $account;
    }

    /**
     * @throws Exception
     */
    public function pay(int $amount): string
    {
        if ($this->canPay($amount)) {
            return sprintf('Paid %s using %s', $amount, $this->whoAmI());
        } elseif ($this->successor !== null) {
            return $this->successor->pay($amount);
        } else {
            throw new Exception('None of the accounts have enough balance');
        }
    }

    public function canPay(int $amount): bool
    {
        return $this->balance >= $amount;
    }
}
