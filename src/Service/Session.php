<?php

namespace App\Service;

use App\Container\Logger;
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
        \Swow\Coroutine::run(function () {
            $frame = new WebSocketFrame();
            $frame->setPayloadData('hello 123');
            $this->connection->sendWebSocketFrame($frame);
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

    public function count()
    {
        return $this->chan->getLength();
    }

    public function pop()
    {
        return $this->chan->pop();
    }
}
