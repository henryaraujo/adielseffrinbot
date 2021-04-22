<?php

namespace AdielSeffrinBot\Commands;

use AdielSeffrinBot\Services\HelloService;

class HelloCommand
{
    public function __construct(private HelloService $service)
    {

    }

    public function execute()
    {
        return $this->service->greeting();
    }
}