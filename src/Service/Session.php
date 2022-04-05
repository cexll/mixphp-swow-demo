<?php

namespace App\Service;

use App\Container\Logger;
use App\Container\Swow\Coroutine;
use Swow\Channel;
use Swow\Http\WebSocketFrame;

class Session
{
    /**
     * @var \Swow\Http\Server\Connection
     */
    protected $connection;

    /**
     * @var \Swow\Channel
     */
    protected $chan;

    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->chan = new Channel(10);
    }

    public function start(): void
    {
        Coroutine::create(function () {
            var_dump(1);
            while (true) {
                var_dump(321);
                $data = $this->chan->pop();
                var_dump(123);
                var_dump($data);
                if (!$data) {
                    return;
                }
                var_dump($data);
                try {
                    $frame = new WebSocketFrame();
                    $frame->setPayloadData('hello 123');
                    $this->connection->sendWebSocketFrame($frame);
                } catch (\Throwable $e) {
                    Logger::instance()->error((string)$e);
                    $this->stop();
                    return;
                }
            }
        });
    }

    public function send(string $message)
    {
        $this->chan->push($message);
    }

    public function stop()
    {
        $this->chan->close();
    }
}
