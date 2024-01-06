<?php

declare(strict_types=1);

namespace App\Creational\AbstractFactory\DoorFactory;

use App\Creational\AbstractFactory\Door\Door;
use App\Creational\AbstractFactory\Door\WoodenDoor;
use App\Creational\AbstractFactory\Expert\Carpenter;
use App\Creational\AbstractFactory\Expert\DoorFittingExpert;

class WoodenDoorFactory implements DoorFactory
{
    public function makeDoor(): Door
    {
        return new WoodenDoor();
    }

    public function makeFittingExpert(): DoorFittingExpert
    {
        return new Carpenter();
    }
}
