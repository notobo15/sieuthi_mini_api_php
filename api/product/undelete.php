<?php

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
include_once "../../configs/ConnectDB.php";
include_once "../../configs/headers.php";
include_once "../../models/Product.php";
require_once "../../auth/auth.php";
$db = new ConnectDB();
$conn = $db->getConnect();
$Product = new Product($conn);
$data = json_decode(file_get_contents("php://input"));
$Product->id = $data->id;
if ($Product->unDelete()) {
  echo json_encode(
    array('message' => 'Product is unblocked')
  );
} else {
  echo json_encode(
    array('message' => 'not work')
  );
}
