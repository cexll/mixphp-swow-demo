<?php

namespace App\Controller;

use App\Container\Upgrade;
use App\Service\Session;
use Mix\Vega\Context;

class WebSocket
{
    public function index(Context $ctx)
    {
        $connection = Upgrade::instance()->upgrade($ctx->request, $ctx->response);
        (new Session($connection))->start();
    }
}
