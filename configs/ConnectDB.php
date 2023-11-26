<?php

class ConnectDB
{
  private $host = "localhost";
  //private $host = "103.101.163.106";
  private $user = "root";
  private $password = "";
  private $db_name = "notobo_sieuthimini";
  // private $host = "localhost";
  // private $user = "root";
  // private $password = "123456";
  // private $db_name = "notobo_sieuthimini";
  private $port = 3306;
  private $con = null;
  // private 
  public function __construct()
  {
  }
  public function getConnect()
  {
    try {
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
      $this->con = new PDO($dsn, $this->user, $this->password);
      $this->con->exec("set names utf8mb4");
      $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $this->con;
    } catch (PDOException $e) {
      echo 'Connection Error: ' . $e->getMessage();
      return null;
    }
  }
}
