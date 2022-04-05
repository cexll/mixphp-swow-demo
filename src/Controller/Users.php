<?php

namespace App\Controller;

use Mix\Framework\Container\DB;
use Mix\Vega\Context;

class Users
{
    /**
     * @param Context $ctx
     * @throws \Exception
     */
    public function index(Context $ctx)
    {
        $row = DB::instance()->table('kd_farm_account')->where('user_id = ?', $ctx->param('id'))->first();
        if (!$row) {
            throw new \Exception('User not found');
        }
        $ctx->JSON(200, [
            'code' => 0,
            'message' => 'ok',
            'data' => $row
        ]);
    }
}
