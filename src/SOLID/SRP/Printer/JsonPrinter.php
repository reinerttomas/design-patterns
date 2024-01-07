<?php

declare(strict_types=1);

namespace App\SOLID\SRP\Printer;

use App\SOLID\SRP\BlogPost;
use App\SOLID\SRP\Transformer\Transformer;
use Exception;

class JsonPrinter implements Printable
{
    public function __construct(
        private Transformer $transformer,
    ) {
    }

    /**
     * @throws Exception
     */
    public function print(BlogPost $blogPost): string
    {
        $json = json_encode($this->transformer->toArray($blogPost));

        if ($json === false) {
            throw new Exception('Error encoding JSON');
        }

        return $json;
    }
}
