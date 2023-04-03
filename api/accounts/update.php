<?php

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
include_once "../../configs/ConnectDB.php";
include_once "../../configs/headers.php";
include_once "../../models/Account.php";
require_once "../../auth/auth.php";
$db = new ConnectDB();
$conn = $db->getConnect();
$account = new Account($conn);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

// Set ID to UPDATE
$account->id = $data->id;
$account->name = $data->name;
$account->password = $data->password;
$account->first_name = $data->first_name;
$account->last_name = $data->last_name;
$account->phone = $data->phone;
$account->birth_date = $data->birth_date;
$account->delivery_address = $data->delivery_address;
$account->gender = $data->gender;

if ($account->updateById()) {
  echo json_encode(
    array('message' => 'account Updated')
  );
} else {
  echo json_encode(
    array('message' => 'account not updated')
  );
}
