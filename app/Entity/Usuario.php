<?php

namespace App\Entity;

use \App\DB\DataBase;
use \PDO;

class Usuario
{
    public $nome;
    public $email;
    public $senha;
    public $ativo;
    public $dt_create;
    public $dt_update;

    /**
     * INSERE UM NOVO USUARIO
     * @return BOOL true
     */
    public function cadastrar(){
        $obDataBase = new DataBase('usuario');
        $this->id = $obDataBase->insert([
            "nome" => $this->nome,
            "email" => $this->email,
            "senha" => $this->senha,
            "dt_create" => $this->dt_create
        ]);
        return true;
    }

    /**
     * VERIFICA SE TEM NO BD O USUARIO PELO EMAIL
     * @param $email
     * @return string
     */
    public static function getUsuarioPorEmail($email){
        return (new DataBase('usuario'))
            ->select(' email = "'.$email.'"')
            ->fetchObject(self::class);
    }

}
