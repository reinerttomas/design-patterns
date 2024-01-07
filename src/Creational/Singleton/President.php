<?php

declare(strict_types=1);

namespace App\Creational\Singleton;

final class President
{
    private static President $instance;

    private function __construct()
    {
        // Hide the constructor
    }

    public static function instance(): President
    {
        if (! isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __clone(): void
    {
        // Disable cloning
    }
}
