<?php

declare(strict_types=1);

namespace App\Creational\AbstractFactory\DoorFactory;

use App\Creational\AbstractFactory\Door\Door;
use App\Creational\AbstractFactory\Expert\DoorFittingExpert;

interface DoorFactory
{
    public function makeDoor(): Door;

    public function makeFittingExpert(): DoorFittingExpert;
}
