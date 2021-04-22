<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use AdielSeffrinBot\Infrastructure\Container;
use AdielSeffrinBot\AdielSeffrinBot;


(new DotEnv())->load(__DIR__ . DIRECTORY_SEPARATOR. '.env');

$container = Container::create();
$container->compile(true);

$adielseffrin = new AdielSeffrinBot($container);