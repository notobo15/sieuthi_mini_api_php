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
include_once "../configs/Connect.php";
$con = new Connect();
$mysql = $con->con;
if (isset($_POST['name']) && isset($_POST["password"])) {
  $name = $_POST['name'];
  $password = $_POST['password'];
  $query = "SELECT * FROM  account where name = '$name' and password= MD5('$password');";
  $stmt = $mysql->prepare($query);

  $result = $mysql->query($query);
  $item = null;
  if ($result) {
    while ($row = $result->fetch_assoc()) {
      extract($row);
      $item = array(
        'id' => $id,
        'account_id' => $account_id,
        'name' => $name,
        'password' => $password,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'phone' => $phone,
        'birth_date' => $birth_date,
        'delivery_address' => $delivery_address,
        'gender' => $gender,
        'group_id' => $group_id,
        'isDeleted' => $isDeleted,
        'createAt' => $createAt,
        'modifiedAt' => $modifiedAt
      );
    }
    session_start();
    $_SESSION["account"] = $item;
  } else {
    printf('No record found.<br />');
  }
  print_r($item);
}
