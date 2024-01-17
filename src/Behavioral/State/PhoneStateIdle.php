<?php

declare(strict_types=1);

namespace App\Behavioral\State;

use Exception;

class PhoneStateIdle implements PhoneState
{
    public function pickUp(): PhoneState
    {
        return new PhoneStatePickedUp();
    }

    /**
     * @throws Exception
     */
    public function hangUp(): PhoneState
    {
        throw new Exception('Already idle');
    }

    /**
     * @throws Exception
     */
    public function dial(): PhoneState
    {
        throw new Exception('Unable to dial in idle state');
    }
}
