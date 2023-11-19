<?php
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Account.php";
//$data = json_decode(file_get_contents("php://input"), TRUE);
if (empty($_POST['username'])) {
  http_response_code(400);
  die(json_encode(array("status" => 0, "message" => "The username is required.")));
}

if (empty($_POST['password'])) {
  http_response_code(400);
  die(json_encode(array("status" => 0, "message" => "The password is required")));
}
$db = new ConnectDB();
$conn = $db->getConnect();
$account = new Account($conn);
$account->name = $_POST['username'];
$account->password = $_POST['password'];
if ($account->checkUserNameExist()) {
  if ($account->login()) {
    $arr = array(
      'id' => (int)$account->id,
      'account_id' => $account->account_id,
      'username' => $account->name,
      'password' => $account->password,
      'first_name' => $account->first_name,
      'last_name' => $account->last_name,
      'phone' => $account->phone,
      'birth_date' => $account->birth_date,
      'delivery_address' => $account->delivery_address,
      'gender' => $account->gender,
      'group_id' => $account->group_id,
      //  'isDeleted' => $account->isDeleted,
      //    'createAt' => $account->createAt,
      // 'modifiedAt' => $account->modifiedAt,
      'permissions' => $account->permissions
    );
    $_SESSION["account"] = $arr;
    $_SESSION["retry"] = 0;
    // setcookie("account", json_encode($arr), time() + (60 * 60 * 24), "/");
    print_r(json_encode($arr));
  } else {


    if (isset($_SESSION["retry"])) {
      $_SESSION["retry"] += 1;
      if ($_SESSION["retry"] >= 3) {
        http_response_code(429);
        print_r(json_encode(array("status" => 0, "message" => "Your account has been locked due to too many login attempts.")));
        return;
      }
    } else {
      $_SESSION["retry"] = 0;
    }


    http_response_code(200);
    print_r(json_encode(array("status" => 0, "message" => "Your Password is incorrect.")));
  }
} else {
  print_r(json_encode(array("status" => 0, "message" => "This username doesn't exist.")));
}
