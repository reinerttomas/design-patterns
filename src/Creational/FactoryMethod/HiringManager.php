<?php

declare(strict_types=1);

namespace App\Creational\FactoryMethod;

abstract class HiringManager
{
    public function takeInterview(): string
    {
        $interviewer = $this->makeInterviewer();

        return $interviewer->askQuestions();
    }

    // Factory Method
    abstract protected function makeInterviewer(): Interviewer;
}
