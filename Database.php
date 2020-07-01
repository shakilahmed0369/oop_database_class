<?php
//Connection detail's
define('DB_host', 'localhost');
define('DB_name', 'magazin');
define('DB_user', 'root');
define('DB_password', '');


class Database {

  private $db;
  public $isConnect;
  public function __construct(){
    $this->isConnect = TRUE;
    try{
      $this->db = new PDO('mysql::host='.DB_host.'; dbname='.DB_name,DB_user, DB_password);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }catch(PDOException $e){
      throw new Exception($e->getMessage());
    }
  }

  //Disconnect from Database
  public function disconnect(){
    $this->db = NULL;
    $this->isConnect = FALSE;
  }

  //Fetch singel row from Database
  public function fetch($query, $param = []){
    try{
      $sql = $this->db->prepare($query);
      $sql->execute($param);
      return $sql->fetch();

    }catch(PDOException $e){
      throw new Exception($e->getMessage());
    }
  }

  //Fetch All row from Database
  public function fetchAll($query, $param = []){
    try{
      $sql = $this->db->prepare($query);
      $sql->execute($param);
      return $sql->fetchAll();

    }catch(PDOException $e){
      throw new Exception($e->getMessage());
    }
  }

  //Fetch insurt row in Database
  public function insurt($query, $param = []){
    try{
      $sql = $this->db->prepare($query);
      $sql->execute($param);
      return TRUE;
    }catch(PDOException $e){
      throw new Exception($e->getMessage());
    }
  }

  //Update row in Database
  public function update($query, $param = []){
    try{
      $sql = $this->db->prepare($query);
      $sql->execute($param);
      return TRUE;
    }catch(PDOException $e){
      throw new Exception($e->getMessage());
    }
  }

  public function coutnRow($query, $param = []){
    try{
      $sql = $this->db->prepare($query);
      $sql->execute($param);
      return $sql->rowCount();
    }catch(PDOException $e){
      throw new Exception($e->getMessage());
    }
  }

  //Delete row from Database
  public function delete($query, $param = []){
    try{
      $sql = $this->db->prepare($query);
      $sql->execute($param);
      return TRUE;
    }catch(PDOException $e){
      throw new Exception($e->getMessage());
    }
    
  }

}