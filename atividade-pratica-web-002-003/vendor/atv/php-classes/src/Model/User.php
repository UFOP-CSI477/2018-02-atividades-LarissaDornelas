<?php

namespace Atvp\Model;

use \Atvp\DB\Sql;
use \Atvp\Model;

class User extends Model{

	const SESSION = "User";

	protected $fields = ["id", "name", "password", "type"];

	
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

		if($password === $data["password"]){

			$user = new User();
			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		}	

		else {
			throw new \Exception("Usuário inexistente ou senha inválida.");
		}

	}


		public static function verifyLogin($num)
		{


		if (
			!isset($_SESSION[User::SESSION])
			|| 
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["id"] > 0
		) {
			if($num==1){
				header("Location: /admin/login");
			} else if($num==2){
				header("Location: /login");
			}
			exit;

		}

	}

	public static function logout()
	{

		$_SESSION[User::SESSION] = NULL;

	}

	public static function listAll(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM users order by id");


	}

	public function save(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_users_save (:name, :password, :email, :type)", array(
			":name"=>$this->getname(),
			":password"=>$this->getpassword(),
			":email"=>$this->getemail(),
			":type"=>$this->gettype()
		));

		$this->setData($results[0]);

	}

	public function get($iduser)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM users WHERE id = $iduser");

		$this->setData($results[0]);
	}

	public function update(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_users_update (:id, :name, :email, :type)", array(
			":id"=>$this->getid(),
			":name"=>$this->getname(),
			":email"=>$this->getemail(),
			":type"=>$this->gettype()
		));

		$this->setData($results[0]);


	}

	public function delete(){
		$sql = new Sql();

		$sql->select("DELETE FROM users where id = :id", array(

			":id"=>$this->getid()
		));

	}
	
}


?>