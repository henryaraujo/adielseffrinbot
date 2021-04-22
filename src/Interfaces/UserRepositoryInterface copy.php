<?php

namespace AdielSeffrinBot\Interfaces;

interface UserRepositoryInterface
{
    public function getUsers();
    public function getUserById(int $id);
} 