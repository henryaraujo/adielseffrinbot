<?php

namespace AdielSeffrinBot\Adapters;

use AdielSeffrinBot\Interfaces\ClientBotAdapterInterface;
use Phergie\Irc\Connection;
use Phergie\Irc\Client\React\Client;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PhergieClientAdapter implements ClientBotAdapterInterface
{
    public function __construct(
        private Client $client,
        private Connection $connection,
        private ContainerInterface $container
    )
    {

		$this->channel  = $container->getParameter('twitch.channel');
    }

    public function connect()
    {
        $this->client->on('connect.after.each', function($connection, $write) {
			$this->join($write);
		});

		$this->client->on('irc.received', function($message, $write, $connection, $logger){
            print_r($message);
		});
        $this->client->run($this->connection);
    }

    public function join($write)
    {
        $write->ircJoin($this->channel);
		$write->ircPrivmsg($this->channel, "I'm here everybody!");
    }

    public function message()
    {

    }
}