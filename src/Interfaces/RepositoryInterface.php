<?php

namespace AdielSeffrinBot\Interfaces;

interface RepositoryInterface
{
    public function findAll();
    public function findById(number $id);
    public function create(object $entity);
    public function remove(number $id);
    public function update(number $id, object $entity);
}