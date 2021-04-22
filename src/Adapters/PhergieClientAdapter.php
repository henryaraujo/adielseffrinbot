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
            if($message['command'] == 'PRIVMSG'){

                ['user' => $user, 'params' => $params] = $message;
                ['text' => $text] = $params;
                [$command, $complement] = explode(' ', $text);
                
                if(str_starts_with($command, '!')) {
                    $service = substr($command, 1).".command";
                    $dispatch = $this->container->get($service);
                    $this->message($write, $dispatch->execute());
                }
            }
		});
        $this->client->run($this->connection);
    }

    public function join($write)
    {
        $write->ircJoin($this->channel);
		$write->ircPrivmsg($this->channel, "I'm here everybody!");
    }

    public function message($write, string $text)
    {
        $write->ircPrivmsg($this->channel, $text);
    }
}