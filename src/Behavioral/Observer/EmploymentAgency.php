<?php

declare(strict_types=1);

namespace App\Behavioral\Observer;

class EmploymentAgency implements Observable
{
    /** @var Observer[] */
    private array $observers = [];

    /** @var string[] */
    private array $messages = [];

    public function notify(JobPost $job): void
    {
        foreach ($this->observers as $observer) {
            $this->messages[] = $observer->onJobPosted($job);
        }
    }

    public function attach(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    public function addJob(JobPost $jobPost): void
    {
        $this->notify($jobPost);
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return $this->messages;
    }
}
