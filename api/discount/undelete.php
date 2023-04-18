<?php

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
include_once "../../configs/ConnectDB.php";
include_once "../../configs/headers.php";
include_once "../../models/Discount.php";
require_once "../../auth/auth.php";
$db = new ConnectDB();
$conn = $db->getConnect();
$Discount = new Discount($conn);
$data = json_decode(file_get_contents("php://input"));
$Discount->id = $data->id;
if ($Discount->unDelete()) {
  echo json_encode(
    array('message' => 'Discount is unblocked')
  );
} else {
  echo json_encode(
    array('message' => 'not work')
  );
}
