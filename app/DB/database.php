<?php

namespace App\DB;

use \PDO;
use \PDOException;

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

  public function execute($query, $params = []){
    try{
      $statement = $this->connection->prepare($query);
      $statement->execute($params);
      return $statement;
    }catch(PDOException $e){
      //MELHORAR O ERRO
      die('Error' . $e->getMessage());
    }
  }

  public function insert($values){

    $fields = array_keys($values);
    $binds = array_pad([], count($fields), '?');
    //echo "<pre>"; print_r($binds); echo "</pre>"; exit;

    $query = 'INSERT INTO '. $this->table .' ('.implode(',', $fields).') VALUES ('.implode(',', $binds).')';
    //echo $query;
    //exit;

    $this->execute($query, array_values($values));
    return $this->connection->lastInsertId();
  }

  public function select($where = null, $order = null, $limit = null, $fields = '*'){
    $where = strlen($where) ? 'WHERE'.$where : '';
    $order = strlen($order) ? 'ORDER BY'.$order : '';
    $limit = strlen($limit) ? 'LIMIT'.$limit : '';

    $query = 'SELECT '. $fields .' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
    return $this->execute($query);
  }

}
