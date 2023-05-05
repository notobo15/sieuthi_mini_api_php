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
if (empty($_POST['password_current'])) {
  http_response_code(400);
  die(json_encode(array("message" => "password_current is require")));
}
if (( $_SESSION['account']["password"] != md5($_POST['password_current']))) {
  http_response_code(400);
  die(json_encode(array("message" => "password current not matching",'statusCode' => 400)));
}

if (empty($_POST['password'])) {
  http_response_code(400);
  die(json_encode(array("message" => "password is require")));
}

// Set ID to UPDATE
$account->password = $_POST['password'];
$account->id = $_SESSION['account']['id'];

if ($account->changePassword()) {
  $_SESSION['account']["password"] = md5($_POST['password']);
  
  echo json_encode(
    array('message' => 'account is changed password success', 'statusCode' => 200)
  );
} else {
  http_response_code(401);
  echo json_encode(
    array('message' => 'not work','statusCode' => 401)
  );
}
