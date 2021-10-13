<?php declare(strict_types=1);

namespace App\Pattern;

use Exception;


class Singleton
{
    private static ?Singleton $instance = null;

    public static function getInstance(): Singleton{

        if(static::$instance === null){
            static ::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct()
    {
    }

    private function __clone(): void
    {
    }

    /**
     * @throws Exception
     */
    public function __wakeup(): void
    {
        throw new Exception("Singleton can not unserialized");
    }
}