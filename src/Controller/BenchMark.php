<?php

namespace App\Controller;

use App\Model\UserCloudDataModel;
use Mix\Vega\Context;

class BenchMark
{
    public function index(Context $ctx)
    {
        $list = (new UserCloudDataModel())->getOneId(19967048);
        $ctx->JSON(200, [
            'code' => 0,
            'message' => 'success',
            'data' => $list
        ]);
    }
}
