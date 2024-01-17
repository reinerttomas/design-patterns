<?php

declare(strict_types=1);

namespace App\Behavioral\State;

interface PhoneState
{
    public function pickUp(): PhoneState;

    public function hangUp(): PhoneState;

    public function dial(): PhoneState;
}
