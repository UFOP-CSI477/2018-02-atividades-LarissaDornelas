<?php

namespace Atvp\Model;

use \Atvp\DB\Sql;
use \Atvp\Model;

class User extends Model{
	public static function login($login, $password)

	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM users WHERE name = :LOGIN", array(
			":LOGIN"=>$login

		));



		if(count($results) === 0){

			throw new \Exception("Usuário inexistente ou senha inválida.");
		}

		$data = $results[0];

		if(password_verify($password, $data["password"]) === true){

			$user = new User();

			$user->setiduser($data["id"]);

		}	

		else {
			throw new \Exception("Usuário inexistente ou senha inválida.");
		}

	}

}


?>