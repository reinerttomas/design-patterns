<?php

declare(strict_types=1);

namespace App\SOLID\SRP\Printer;

use App\SOLID\SRP\BlogPost;

class HtmlPrinter implements Printable
{
    public function print(BlogPost $blogPost): string
    {
        return "<article>
                    <h1>{$blogPost->title()}</h1>
                    <article>
                        <p>{$blogPost->createdAt()->format('Y-m-d H:i:s')}</p>
                        <p>{$blogPost->author()->fullName()}</p>
                        <p>{$blogPost->content()}</p>
                    </article>
                </article>";
    }
}
