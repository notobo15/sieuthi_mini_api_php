<?php
class Connect
{
  public $user = "root";
  public $host = "localhost";
  public $password = "";
  public $db_name = "sieuthi_mini";
  public $con = null;
  public function __construct()
  {
    $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
  }
  public function getConnect()
  {
    if ($this->con->connect_errno) {
      echo $this->con->connect_error;
    } else {
      echo "Successfully";
    }
  }
}
