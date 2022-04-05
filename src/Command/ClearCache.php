<?php

namespace App\Command;

use Mix\Cli\Flag;
use Mix\Cli\RunInterface;
use Mix\Framework\Container\RDS;

/**
 * Class ClearCache
 * @package App\Command
 */
class ClearCache implements RunInterface
{
    public function main(): void
    {
        $key = Flag::match('k', 'key')->string();
        RDS::instance()->del($key);
        print 'ok';
    }
}
