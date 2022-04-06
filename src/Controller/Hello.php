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
        $session = (new Session($ctx->response->getRawResponse()));
        $ctx->JSON(200, [
            'code' => 0,
            'message' => 'success',
            'data' => [
                'length' => $session->count(),
                'pop' => $session->pop(),
            ]
        ]);
    }
}
