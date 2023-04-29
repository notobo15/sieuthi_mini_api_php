<?php

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
include_once "../../configs/ConnectDB.php";
include_once "../../configs/headers.php";
include_once "../../models/Account.php";
// require_once "../../auth/auth.php";
$db = new ConnectDB();
$conn = $db->getConnect();
$account = new Account($conn);

// Get raw posted data
// $data = json_decode(file_get_contents("php://input"));
print_r($_POST);
// Set ID to UPDATE
$account->id = $_POST['id'];
$account->first_name = $_POST['first_name'];
$account->last_name = $_POST['last_name'];
$account->phone = $_POST['phone'];
$account->birth_date = $_POST['birth_date'];
$account->delivery_address = $_POST['delivery_address'];
$account->gender = $_POST['gender'];
$account->provinceCode = $_POST['provinceCode'];
$account->districtCode = $_POST['districtCode'];
$account->wardCode = $_POST['wardCode'];

if ($account->updateById()) {
  echo json_encode(
    array('message' => 'account Updated')
  );
} else {
  echo json_encode(
    array('message' => 'account not updated')
  );
}
