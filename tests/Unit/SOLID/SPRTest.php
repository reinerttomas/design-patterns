<?php

declare(strict_types=1);

namespace Tests\Unit\SOLID;

use App\SOLID\SRP\Author;
use App\SOLID\SRP\BlogPost;
use App\SOLID\SRP\Printer\HtmlPrinter;
use App\SOLID\SRP\Printer\JsonPrinter;
use App\SOLID\SRP\Transformer\BlogPostTransformer;
use DateTime;

beforeEach(function () {
    $this->blogPost = new BlogPost(
        new Author('John', 'Doe'),
        'My title',
        'My content',
        new DateTime('2024-01-01 12:00:00'),
    );
});

it('can be print to html', function () {
    $htmlPrinter = new HtmlPrinter();

    expect($htmlPrinter->print($this->blogPost))
        ->toContain(
            'John Doe',
            'My title',
            'My content',
            '2024-01-01 12:00:00',
        );
});

it('can be print to json', function () {
    $blogPostTransformer = new BlogPostTransformer();
    $jsonPrinter = new JsonPrinter($blogPostTransformer);

    expect($jsonPrinter->print($this->blogPost))
        ->json()
        ->toBe([
            'author' => 'John Doe',
            'title' => 'My title',
            'content' => 'My content',
            'createdAt' => '2024-01-01 12:00:00',
        ]);
});
