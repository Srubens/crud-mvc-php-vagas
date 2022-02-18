<?php

namespace App\Entity;
use \App\DB\DataBase;

class Vaga
{
	/**
	 * IDENTIFICADOR DA Vaga
	 * @VAR integer
	 */
	public $id;

	/**
	 * TITULO DA VAGA
	 * @var string
	 */
	public $titulo;

	/**
	 * DESCRICAO DA VAGA
	 * @var string
	 */
	public $descricao;

	/**
	 * DEFINE SE A VAGA ESTA ATIVA
	 * @var string [s/n]
	 */
	public $ativo;

	/**
	 * DATA DA PUBLICACAO DA VAGA
	 * @var string
	 */
	public $data;

	public function cadastrar(){
		//DEFINIR A DATA
		$this->data = date('Y-m-d H:i:s');
		//INSERIR NO BANCO
		$obDataBase = new DataBase('vaga');
		echo "<pre>"; print_r($obDataBase); echo "</pre>"; exit;
		//ATRIBUIR ID
		//RETORNAR SUCESS
	}

}
