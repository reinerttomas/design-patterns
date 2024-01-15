<?php

declare(strict_types=1);

namespace Tests\Unit\Behavioral;

use App\Behavioral\Memento\Editor;

it('can save content and restore it', function () {
    $editor = new Editor();

    $editor->type('This is the first sentence.');
    $editor->type('This is the second.');

    $saved = $editor->save();

    $editor->type('And this is third.');

    expect($editor->content())
        ->toBe('This is the first sentence. This is the second. And this is third.');

    $editor->restore($saved);

    expect($editor->content())
        ->toBe('This is the first sentence. This is the second.');
});
