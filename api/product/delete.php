<?php
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Product.php";
require_once "../../auth/auth.php";
$db = new ConnectDB();
$conn = $db->getConnect();
$Product = new Product($conn);
// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

// Set ID to UPDATE
$Product->id = $data->id;
if ($Product->delete()) {
  http_response_code(200);
  print_r(json_encode(array("message" => "delete success")));
} else {
  http_response_code(400);
  print_r(json_encode(array("message" => "not found")));
}
