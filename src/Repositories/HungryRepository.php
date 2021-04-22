<?php

namespace AdielSeffrinBot\Repositories;

use AdielSeffrinBot\Interfaces\HungryRepositoryInterface;
class HungryRepository implements HungryRepositoryInterface
{
    public function __construct(private \PDO $database){}
    
    public function getTotalTakeHungryByUser(int $userId){
        $stmt = $this->database->prepare('SELECT count(id_usuario) AS total FROM tentativas_fome WHERE id_usuario = :id_usuario AND data_tentativa = curdate()');
        $stmt->execute(array(':id_usuario'=> $userId));
        list($total)= $stmt->fetch();
        return $total; 
    }

    
}