<?php

namespace App\Controller;

use App\Model\UserModel;
use Firebase\JWT\JWT;
use Mix\Vega\Context;

class Auth
{
    /**
     * @param Context $ctx
     */
    public function index(Context $ctx)
    {
        $time = time();
        $payload = [
            "iss" => "http://example.org", // 签发人
            'iat' => $time, // 签发时间
            'exp' => $time + 7200, // 过期时间
            'uid' => 100008,
        ];
        $token = JWT::encode($payload, config('jwt')['key'], 'HS256');
//        $user = (new UserModel())->getOneId(414, [
//            'user_id', 'nickname'
//        ]);
        $ctx->JSON(200, [
            'code' => 0,
            'message' => 'ok',
            'data' => [
                'access_token' => $token,
                'expire_in' => 7200,
                'user' => $token
            ]
        ]);
    }
}
