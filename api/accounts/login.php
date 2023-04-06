<?php
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Account.php";
//$data = json_decode(file_get_contents("php://input"), TRUE);

if (empty($_POST['name'])) {
  http_response_code(400);
  die(json_encode(array("message" => "name is require")));
}

if (empty($_POST['password'])) {
  http_response_code(400);
  die(json_encode(array("message" => "password is require")));
}
$db = new ConnectDB();
$conn = $db->getConnect();
$account = new Account($conn);
$account->name = $_POST['name'];
$account->password = $_POST['password'];
if ($account->checkUserNameExist()) {
  if ($account->login()) {
    $arr = array(
      'id' => $account->id,
      'account_id' => $account->account_id,
      'name' => $account->name,
      'password' => $account->password,
      'first_name' => $account->first_name,
      'last_name' => $account->last_name,
      'phone' => $account->phone,
      'birth_date' => $account->birth_date,
      'delivery_address' => $account->delivery_address,
      'gender' => $account->gender,
      'group_id' => $account->group_id,
      'isDeleted' => $account->isDeleted,
      'createAt' => $account->createAt,
      'modifiedAt' => $account->modifiedAt,
      'permissions' => $account->permissions
    );
    $_SESSION["account"] = $arr;
    // setcookie("account", json_encode($arr), time() + (60 * 60 * 24), "/");
    print_r(json_encode($arr));
  } else {
    http_response_code(200);
    print_r(json_encode(array("message" => "khong dung mat khau")));
  }
} else {
  print_r(json_encode(array("message" => "tai khoan khong ton tai")));
}
