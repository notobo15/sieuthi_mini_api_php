<?php
require_once "../../../configs/ConnectDB.php";
require_once "../../../configs/headers.php";
require_once "../../../models/Order.php";
require_once "../../../auth/auth.php";

$db = new ConnectDB();
$conn = $db->getConnect();
$Order = new Order($conn);

if (empty($_POST['id'])) {
  http_response_code(400);
  die(json_encode(array("message" => "id is require")));
}
if (empty($_POST['status'])) {
  http_response_code(400);
  die(json_encode(array("message" => "status is require")));
}
$Order->id = $_POST['id'];
$Order->status = $_POST['status'];
$result = $Order->checkOrderById($_POST['id']);
if ($result) {
  $isSuccess = $Order->changeStatus();
  if ($isSuccess) {
    print_r(json_encode(array("message" => "update success")));
  } else {
    print_r(json_encode(array("message" => "update falied")));
  }
}
