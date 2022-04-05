<?php

namespace App\Controller;

use Mix\Vega\Context;

class Hello
{
    /**
     * @param Context $ctx
     */
    public function index(Context $ctx)
    {
        $ctx->JSON(200, [
            'code' => 0,
            'message' => 'success',
            'data' => ['hello world']
        ]);
    }
}
