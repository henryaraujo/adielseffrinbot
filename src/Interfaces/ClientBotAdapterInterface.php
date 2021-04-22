<?php

namespace AdielSeffrinBot\Interfaces;

interface ClientBotAdapterInterface
{
	public function connect();
	public function join($write);
	public function message($write, string $text);
}