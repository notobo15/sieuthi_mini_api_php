<?php

class ConnectDB
{
  private $host = "localhost";
  private $user = "root";
  private $password = "";
  private $db_name = "sieuthi_mini";
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
      $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $this->con;
    } catch (PDOException $e) {
      echo 'Connection Error: ' . $e->getMessage();
      return null;
    }
  }
}
