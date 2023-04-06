<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>

<body>
  <form action="" method="post">
    name<input type="text" id="name" name="name">
    password<input type="password" id="password" name="password">
    <button type="submit" id="btn_submit">login</button>
  </form>
</body>

</html>
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include_once "../configs/Connect.php";

try {

$con = new Connect();
$mysql = $con->con;
  $query = "SELECT * FROM tbl_product;";
  $result = $mysql->query($query);
  $arr = [];
  if ($result) {
    while ($row = $result->fetch_assoc()) {
     
      $item = array(
        'id' => $row['id'],
      );
      $arr[] = $item;
    }
  }
  print_r(json_encode($arr));
}

//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}




