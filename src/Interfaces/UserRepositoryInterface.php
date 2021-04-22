<?php

namespace AdielSeffrinBot\Interfaces;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getUsers();
    public function getUserById(int $id);
} 