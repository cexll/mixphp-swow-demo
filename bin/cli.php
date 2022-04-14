#!/usr/bin/env php
<?php
ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');
ini_set('error_reporting', E_ALL ^ E_NOTICE);

require __DIR__ . '/../vendor/autoload.php';

use App\Error;
use Dotenv\Dotenv;
use Mix\Cli\Cli;

Dotenv::createUnsafeImmutable(__DIR__ . '/../', '.env')->load();
define("APP_DEBUG", env('APP_DEBUG'));

Error::register();

Cli::setName('app')->setVersion('0.0.0-alpha');

Swoole\Coroutine\run(function () {
    $cmds = [
        new Mix\Cli\Command([
            'name' => 'test',
            'short' => '测试命令行',
            'options' => [
                new Mix\Cli\Option([
                    'names' => ['k', 'key'],
                    'usage' => 'Key name',
                ]),
                new Mix\Cli\Option([
                    'names' => ['v', 'value'],
                    'usage' => 'value name',
                ]),
                new Mix\Cli\Option([
                    'names' => ['q', 'query'],
                    'usage' => 'query name',
                ]),
            ],
            'run' => new App\Command\ClearCache(),
        ])
    ];
    App\Container\DB::enableCoroutine();
    App\Container\RDS::enableCoroutine();
    Cli::addCommand(...$cmds)->run();
});

