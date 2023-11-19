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


// Set ID to UPDATE
$Product->id = $_POST['id'];
if ($Product->delete()) {
  http_response_code(200);
  print_r(json_encode(array("status" => 1, "message" => "Product deleted successfully.")));
} else {
  http_response_code(404);
  print_r(json_encode(array("status" => 0, "message" => "Product not found")));
}
