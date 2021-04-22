<?php

namespace AdielSeffrinBot\Interfaces;

interface HungryRepositoryInterface
{
    public function getTotalTakeHungryByUser(int $userId);
} 