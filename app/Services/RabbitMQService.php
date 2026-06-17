<?php

namespace App\Services;

use Exception;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;


readonly class RabbitMQService
{
    private AMQPStreamConnection $connection;
    private AMQPChannel $channel;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $config = config('rabbitmq');

        $this->connection = new AMQPStreamConnection(
            $config['host'],
            $config['port'],
            $config['user'],
            $config['password']
        );

        $this->channel = $this->connection->channel();
    }

    /**
     * @throws Exception
     */
    public function __destruct()
    {
        $this->channel->close();
        $this->connection->close();
    }

    public function publish(string $queue, array $data): void
    {
        $this->channel->queue_declare($queue, false, true, false, false);

        $message = new AMQPMessage(
            json_encode($data),
            ['delivery_mode' => 2] // persistent
        );

        $this->channel->basic_publish($message, '', $queue);
    }




}
