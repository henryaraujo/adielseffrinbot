<?php 

namespace AdielSeffrinBot\Services;

use AdielSeffrinBot\Interfaces\UserRepositoryInterface;

class UserService
{

  	public function __construct(private UserRepositoryInterface $repository) {}
	
	public function getUser()
	{
		$palyers = $this->repository->getUsers();

		$result = [];
		foreach ($palyers as $value){
			$result[] = $value['nick'];
		}

		return $result;
	}
    
}