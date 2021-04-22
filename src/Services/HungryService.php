<?php 

namespace AdielSeffrinBot\Services;

use AdielSeffrinBot\Interfaces\HungryRepositoryInterface;

class HungryService
{

  	public function __construct(private HungryRepositoryInterface $repository) {}

  	public function totalPlayedToday($userId)
  	{
		$this->repository->getTotalTakeHungryByUser($userId);
		
  	}
    
  /* 
  public function jogar($id,$conn){
    $pontos = mt_rand (0, 9) + mt_rand (0, 99)/100;
    $stmt = $conn->prepare('INSERT INTO tentativas_fome (id_usuario, pontos) VALUES (:id_usuario, :pontos)');
    $stmt->execute(array(':id_usuario'=>$id, ':pontos' => $pontos));  
    return $pontos;  
  } */
}