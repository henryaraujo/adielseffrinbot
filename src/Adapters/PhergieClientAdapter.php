<?php

namespace AdielSeffrinBot\Adapters;

use AdielSeffrinBot\Interfaces\ClientBotAdapterInterface;
use Phergie\Irc\Connection;
use Phergie\Irc\Client\React\Client;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PhergieClientAdapter implements ClientBotAdapterInterface
{
    public function __construct(private Client $client, ContainerInterface $container)
    {
        $this->options = [
			'serverHostname' => $container->getParameter('twitch.host'),
			'serverPort' => $container->getParameter('twitch.port'),
			'password' => $container->getParameter('twitch.password'),
			'nickname' => $container->getParameter('twitch.nickname'),
			'username' => $container->getParameter('twitch.nickname')
		];
		$this->channel  = $container->getParameter('twitch.channel');
		$this->connection = new Connection($this->options);
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