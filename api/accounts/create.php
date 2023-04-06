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
// $data = json_decode(file_get_contents('php://input'), true);

if (empty($_POST['name'])) {
  http_response_code(400);
  die(json_encode(array("message" => "name is require")));
}
if (empty($_POST['password'])) {
  http_response_code(400);
  die(json_encode(array("message" => "password is require")));
}
if (empty($_POST['phone'])) {
  http_response_code(400);
  die(json_encode(array("message" => "phone is require")));
}

$account->name = $_POST['name'];
if ($account->checkUserNameExist()) {
  // http_response_code(400);
  die(json_encode(array("message" => "tai khoan da ton tai")));
}
$account->phone = $_POST['phone'];
$account->password = $_POST['password'];

if (isset($_POST['first_name']))
  $account->first_name = $_POST['first_name'];

if (isset($_POST['last_name']))
  $account->last_name = $_POST['last_name'];
if (isset($_POST['birth_date']))
  $account->birth_date = $_POST['birth_date'];
if (isset($_POST['gender']))
  $account->gender = $_POST['gender'];
if (isset($_POST['delivery_address']))
  $account->delivery_address = $_POST['delivery_address'];


if ($account->create()) {
  echo json_encode(
    array('message' => 'account Created')
  );
} else {
  echo json_encode(
    array('message' => 'account Not Created')
  );
}
