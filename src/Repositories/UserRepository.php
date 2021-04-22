<?php

namespace AdielSeffrinBot\Repositories;

use AdielSeffrinBot\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(private \PDO $database)
    {

    }
    
    public function getUsers(){
        return $this->database->query("SELECT * FROM user");
    }

    public function getUserById(int $id)
    {
        
    }
}