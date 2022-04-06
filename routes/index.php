<?php

use App\Controller\Hello;

return function (Mix\Vega\Engine $vega) {
    $vega->handle('/hello', [new Hello(), 'index'])->methods('GET');
    $vega->handle('/websocket', [new \App\Controller\WebSocket(), 'index'])->methods('GET');
};
