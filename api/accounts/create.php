<?php
// Headers
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
include_once "../../configs/headers.php";
include_once '../../configs/ConnectDB.php';
include_once '../../models/Account.php';
$db = new ConnectDB();
$conn = $db->getConnect();
$account = new Account($conn);

$data = json_decode(file_get_contents("php://input"));


if (empty($data->name)) {
  http_response_code(400);
  die(json_encode(array("message" => "name is require")));
}
if (empty($data->password)) {
  http_response_code(400);
  die(json_encode(array("message" => "password is require")));
}
if (empty($data->phone)) {
  http_response_code(400);
  die(json_encode(array("message" => "phone is require")));
}

$account->name = $data->name;
$account->password = $data->password;
$account->first_name = $data->first_name;
$account->last_name = $data->last_name;
$account->phone = $data->phone;
$account->birth_date = $data->birth_date;
$account->gender = $data->gender;
$account->delivery_address = $data->delivery_address;

// Create Category
if ($account->create()) {
  echo json_encode(
    array('message' => 'account Created')
  );
} else {
  echo json_encode(
    array('message' => 'account Not Created')
  );
}
