<?php

namespace App\Entity;

use \App\DB\DataBase;
use \PDO;

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
		$this->id = $obDataBase->insert([
			'titulo' => $this->titulo,
			'descricao' => $this->descricao,
			'ativo' => $this->ativo,
			'data' => $this->data
		]);
		//echo "<pre>"; print_r($this); echo "</pre>"; exit;
		//ATRIBUIR ID
		//RETORNAR SUCESS
		return true;
	}

	public static function getVagas($where = null, $order = null, $limit = null){
		return (new DataBase('vaga'))->select($where, $order, $limit)
		                             ->fetchAll(PDO::FETCH_CLASS,self::class);
	}

	public static function getVaga($id){
		return (new DataBase('vaga'))->select(' id = '.$id)
		                             ->fetchObject(self::class);
	}

}
