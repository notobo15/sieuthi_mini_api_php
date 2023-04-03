<?php
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Account.php";
$data = json_decode(file_get_contents("php://input"));

if (empty($data->name)) {
  http_response_code(400);
  die(json_encode(array("message" => "name is require")));
}
if (empty($data->password)) {
  http_response_code(400);
  die(json_encode(array("message" => "password is require")));
}
$db = new ConnectDB();
$conn = $db->getConnect();
$account = new Account($conn);
$account->name = $data->name;
$account->password = $data->password;
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
  setcookie("account", json_encode($arr), time() + (60 * 5), "/");
  print_r(json_encode($arr));
} else {
  http_response_code(200);
  print_r(json_encode(array("message" => "not found")));
}
