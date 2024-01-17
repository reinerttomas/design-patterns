<?php

declare(strict_types=1);

namespace App\Behavioral\State;

class Phone
{
    private PhoneState $state;

    public function __construct()
    {
        $this->state = new PhoneStateIdle();
    }

    public function state(): PhoneState
    {
        return $this->state;
    }

    public function pickUp(): void
    {
        $this->state = $this->state->pickUp();
    }

    public function hangUp(): void
    {
        $this->state = $this->state->hangUp();
    }

    public function dial(): void
    {
        $this->state = $this->state->dial();
    }
}
