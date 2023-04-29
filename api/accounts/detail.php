<?php
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Account.php";
// require_once "../../auth/auth.php";


$db = new ConnectDB();
$conn = $db->getConnect();
$account = new Account($conn);
$id = isset($_GET['id']) ? $_GET['id'] : die();
if ($account->getSingleById($id) && $id) {
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
    'modifiedAt' => $account->modifiedAt
  );
  print_r(json_encode($arr));
} else {
  http_response_code(200);
  print_r(json_encode(array("message" => "not found")));
}
