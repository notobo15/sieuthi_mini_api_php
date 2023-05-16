<?php
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Account.php";
// require_once "../../auth/auth.php";

$db = new ConnectDB();
$conn = $db->getConnect();
$account = new Account($conn);
/* 

*/


$result = $account->getList();
$arr = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
  extract($row);
  $cat_item = array(
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
  $arr[] = $cat_item;
}
echo json_encode($arr);
