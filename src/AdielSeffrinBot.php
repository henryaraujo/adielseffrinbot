<?php
/* 
  require_once './comandos.php';
*/

namespace AdielSeffrinBot;

use AdielSeffrinBot\Adapters\PhergieClientAdapter;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Phergie\Irc\Client\React\Client;

class AdielSeffrinBot
{
	public function __construct(ContainerInterface $container)
	{
		$clientBot = new PhergieClientAdapter(new Client(), $container);
  	}  
}
