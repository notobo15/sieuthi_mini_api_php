<?php
// Headers
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
include_once "../../../configs/headers.php";
include_once '../../../configs/ConnectDB.php';
include_once '../../../models/Product.php';
// require_once "../../../auth/auth.php";
$db = new ConnectDB();
$conn = $db->getConnect();
if (empty($_POST['discount_id'])) {
  http_response_code(400);
  die(json_encode(array("message" => "discount_id is require")));
}
if (empty($_POST['product_id'])) {
  http_response_code(400);
  die(json_encode(array("message" => "product_id is require")));
}
print_r($_POST['discount_id']);
print_r($_POST['product_id']);
$Product = new Product($conn);
$Product->id = $_POST['product_id'];
if ($Product->create_discount($_POST['discount_id'])) {
  echo json_encode(
    array('message' => 'Success')
  );
} else {
  echo json_encode(
    array('message' => 'Failed')
  );
}
