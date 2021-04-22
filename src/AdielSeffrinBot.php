<?php

namespace AdielSeffrinBot;

use Symfony\Component\DependencyInjection\ContainerInterface;
class AdielSeffrinBot
{
	public function __construct(ContainerInterface $container)
	{
		$container->get('AdielSeffrinBot\Adapters\PhergieClientAdapter');
  	}  
}
