<?php

declare(strict_types=1);

use App\Creational\AbstractFactory\DoorFactory\IronDoorFactory;
use App\Creational\AbstractFactory\DoorFactory\WoodenDoorFactory;

it('can make wooden door', function () {
    $woodenDoor = new WoodenDoorFactory();

    $door = $woodenDoor->makeDoor();
    $expert = $woodenDoor->makeFittingExpert();

    expect($door->description())
        ->toBe('I am a wooden door')
        ->and($expert->description())
        ->toBe('I can only fit wooden doors');
});

it('can make iron door', function () {
    $ironFactory = new IronDoorFactory();

    $door = $ironFactory->makeDoor();
    $expert = $ironFactory->makeFittingExpert();

    expect($door->description())
        ->toBe('I am an iron door')
        ->and($expert->description())
        ->toBe('I can only fit iron doors');
});
