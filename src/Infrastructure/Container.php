<?php

namespace AdielSeffrinBot\Infrastructure;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class Container 
{
    public static function create(): ContainerBuilder
    {
        $container = new ContainerBuilder();
        $fileLocator = new FileLocator([__DIR__. DIRECTORY_SEPARATOR .'..'.DIRECTORY_SEPARATOR .'..'.DIRECTORY_SEPARATOR .'config']);
        $loader = new YamlFileLoader($container , $fileLocator);
        $loader->load('services.yml');

        return $container;
    }
}