<?php

namespace AdielSeffrinBot\Interfaces;

interface HungryRepositoryInterface extends RepositoryInterface
{
    public function getTotalTakeHungryByUser(int $userId);
} 