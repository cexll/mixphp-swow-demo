<?php

namespace App\Controller;

use App\Service\Session;
use Mix\Vega\Context;

class Hello
{
    /**
     * @param Context $ctx
     * @throws \Exception
     */
    public function index(Context $ctx)
    {
        $ctx->JSON(200, [
            'code' => 0,
            'message' => 'success',
            'data' => 'hello world',
        ]);
    }
}
