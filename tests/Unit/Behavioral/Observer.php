<?php

declare(strict_types=1);

namespace Tests\Unit\Behavioral;

use App\Behavioral\Observer\EmploymentAgency;
use App\Behavioral\Observer\JobPost;
use App\Behavioral\Observer\JobSeeker;

it('can notify job seekers when new job added.', function () {
    $johnDoe = new JobSeeker('John Doe');
    $janeDoe = new JobSeeker('Jane Doe');

    $jobPostings = new EmploymentAgency();
    $jobPostings->attach($johnDoe);
    $jobPostings->attach($janeDoe);

    $jobPostings->addJob(new JobPost('Software Engineer'));

    expect($jobPostings->messages())
        ->toBe([
            'Hi John Doe! New job posted: Software Engineer',
            'Hi Jane Doe! New job posted: Software Engineer',
        ]);
});
