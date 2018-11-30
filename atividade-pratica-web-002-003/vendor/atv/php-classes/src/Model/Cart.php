<?php

namespace Atvp\Model;

use \Atvp\DB\Sql;
use \Atvp\Model;



class Cart extends Model{

	const SESSION = "cart";


	public function add($id, $qtd){

		if(!isset($_SESSION["carrinho"])){

			$_SESSION["carrinho"] = array();
		}

		$sql= new Sql();

		$result = $sql-> select("SELECT * FROM produtos WHERE id = :id", array(
			":id"=>$id
		));
		
		$this->setData($result[0]);

		$resultados = array(
		    'id' => $this->getid(),
		    'imagem'=>$this->getimagem(),
		    'nome' => $this->getnome(),
		    'preco' => $this->getpreco(),
			'qtd'=>$qtd
		);

		array_push($_SESSION["carrinho"],$resultados);

	}

	public function getTotal(){

		$total=0;

		foreach ($_SESSION["carrinho"] as $preco => $value) {
			$total += ($value["preco"] * $value["qtd"]);
		}

		return $total;

	}
}