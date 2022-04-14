<?php

namespace App\Container\Swow\WebSocket;

use App\Container\Swow\Exception\UpgradeException;
use Mix\Http\Message\Response;
use Mix\Http\Message\ServerRequest;

class Upgrade
{

    public function upgrade(ServerRequest $request, Response $response): \Swow\Http\Server\Connection
    {
        $swowRequest = $request->getRawRequest();
        if (!$swowRequest || !$swowRequest instanceof \Swow\Http\Server\Request) {
            throw new UpgradeException('Handshake failed, only the swoole coroutine environment is supported');
        }
        $swowResponse = $response->getRawResponse();
        if (!$swowResponse || !$swowResponse instanceof \Swow\Http\Server\Connection) {
            throw new UpgradeException('Handshake failed, only the swoole coroutine environment is supported');
        }

        return $swowResponse;
    }
}
