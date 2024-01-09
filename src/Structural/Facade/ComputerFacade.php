<?php

declare(strict_types=1);

namespace App\Structural\Facade;

class ComputerFacade
{
    public function __construct(private Computer $computer)
    {
    }

    /**
     * @return array<string>
     */
    public function turnOn(): array
    {
        $result = [];

        $result[] = $this->computer->getElectricShock();
        $result[] = $this->computer->makeSound();
        $result[] = $this->computer->showLoadingScreen();
        $result[] = $this->computer->bam();

        return $result;
    }

    /**
     * @return array<string>
     */
    public function turnOff(): array
    {
        $result = [];

        $result[] = $this->computer->closeEverything();
        $result[] = $this->computer->pullCurrent();
        $result[] = $this->computer->sooth();

        return $result;
    }
}
