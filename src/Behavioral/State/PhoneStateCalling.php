<?php

declare(strict_types=1);

namespace App\Behavioral\State;

use Exception;

class PhoneStateCalling implements PhoneState
{
    /**
     * @throws Exception
     */
    public function pickUp(): PhoneState
    {
        throw new Exception('Already picked up');
    }

    public function hangUp(): PhoneState
    {
        return new PhoneStateIdle();
    }

    /**
     * @throws Exception
     */
    public function dial(): PhoneState
    {
        throw new Exception('Already dialing');
    }
}
