<?php

declare(strict_types=1);

namespace App\Creational\AbstractFactory\DoorFactory;

use App\Creational\AbstractFactory\Door\Door;
use App\Creational\AbstractFactory\Door\IronDoor;
use App\Creational\AbstractFactory\Expert\DoorFittingExpert;
use App\Creational\AbstractFactory\Expert\Welder;

class IronDoorFactory implements DoorFactory
{
    public function makeDoor(): Door
    {
        return new IronDoor();
    }

    public function makeFittingExpert(): DoorFittingExpert
    {
        return new Welder();
    }
}
