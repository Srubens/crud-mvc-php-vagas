<?php

namespace App\DB;

use \PDO;

class DataBase
{

  const HOST = 'localhost';
  const PORT = '3308';
  const NAME = 'wdev_vagas';
  const USER = 'root';
  const PASS = '123456';


  private $table;
  private $connection;

  public function __construct($table = null){
    $this->table = $table;
    $this->setConnection();
  }

  private function setConnection(){
    try{
      $this->connection = new PDO('mysql:host='.self::HOST.';port='.self::PORT.';dbname='.self::NAME,self::USER,self::PASS);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      //MELHORAR O ERRO
      die('Error' . $e->getMessage());
    }
  }

}
