<?php
class Connect
{
  public $user = "notobo_sieuthimini";
  public $host = "localhost";
  public $password = "notobo_sieuthimini";
  public $db_name = "notobo_sieuthimini";
  public $con = null;
  public function __construct()
  {
    $this->con = mysqli_connect($this->host, $this->user, $this->password);
    // mysql_select_db($this->db_name, $this->con);
	// $a = mysql_query("SET NAMES 'utf8'", $this->con);la
  }
  public function checkConnect()
  {
    if ($this->con->connect_errno) {
      echo $this->con->connect_error;
    } else {
      echo "Successfully";
    }
  }
}
