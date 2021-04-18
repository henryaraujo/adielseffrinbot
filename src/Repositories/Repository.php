<?php

namespace AdielSeffrinBot\Repositories;

use AdielSeffrinBot\Interfaces\RepositoryInterface;

abstract class Repository implements RepositoryInterface
{
    public function __construct()
    {

    }

    public function findAll()
    {

    }

    public function findById(int $id)
    {
        
    }

    public function create(object $entity)
    {

    }

    public function update(int $id, object $entity)
    {

    }

    public function remove(int $id)
    {

    }
}