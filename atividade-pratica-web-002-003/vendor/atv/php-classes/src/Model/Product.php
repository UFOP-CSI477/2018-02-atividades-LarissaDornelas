<?php

namespace Atvp\Model;

use \Atvp\DB\Sql;
use \Atvp\Model;

class Product extends Model{


	public static function listAll(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM produtos order by id");
	}

	public static function listLast(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM produtos order by created_at DESC LIMIT 10");
	}

	public static function checkList($list)
	{

	foreach ($list as &$row) 
	{

		$p = new Product();
		$p->setData($row);
		$row = $p->getValues();
	}

	return $list;

	}

	public function save(){

		$sql = new Sql();

		$dataNow=date('Y-m-d H:i:s');

		$results = $sql->select("CALL sp_products_save (:nome, :preco, :imagem, :created)", array(
			":nome"=>$this->getnome(),
			":preco"=>$this->getpreco(),
			":imagem"=>$this->getimagem(),
			":created"=> $dataNow
		));

		$this->setData($results[0]);

	}

	public function get($idproduct)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM produtos WHERE id = :idproduct",array(
		    ":idproduct"=> $idproduct
		));

		$this->setData($results[0]);
	}
 
 	public function delete(){
		$sql = new Sql();

		$sql->query("DELETE FROM produtos where id = :id", array(

			":id"=>$this->getid()
		));

	}

	public function checkPhoto()
	{

			$img = "/res/site/img/produtos/" . $this->getimagem();
		
		if ($img == "/res/site/img/produtos/")
		{
			$img = "/res/site/img/produtos/default.png";
		}

		return $this->setimagem($img);

	}

	public function getValues()
	{
		$this->checkPhoto();

		$values = parent :: getValues();

		return $values;
	}

	public function update(){

		$sql = new Sql();

		$dataNow=date('Y-m-d H:i:s');

		$results = $sql->query(
			"UPDATE produtos 
			SET nome = :nome, preco = :preco, imagem = :imagem, updated_at = :updated_at WHERE id= :id;",
			array(
			":id"=>$this->getid(),
			":nome"=>$this->getnome(),
			":preco"=>$this->getpreco(),
			":imagem"=>$this->getimagem(),
			":updated_at"=>$dataNow
		));


	}

}


?>