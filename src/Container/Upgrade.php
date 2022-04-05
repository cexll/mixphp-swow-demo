<?php

namespace App\Container;

class Upgrade
{
    /**
     * @var \App\Container\Swow\WebSocket\Upgrade
     */
    private static $instance;

    public static function init(): void
    {
        self::$instance = new \App\Container\Swow\WebSocket\Upgrade();
    }

    public static function instance(): \App\Container\Swow\WebSocket\Upgrade
    {
        if (!isset(self::$instance)) {
            static::init();
        }
        return self::$instance;
    }
}
