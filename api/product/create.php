<?php
// Headers
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
include_once "../../configs/headers.php";
include_once '../../configs/ConnectDB.php';
include_once '../../models/Product.php';
// require_once "../../auth/auth.php";
$db = new ConnectDB();
$conn = $db->getConnect();
$Product = new Product($conn);
require_once "../../configs/uploadImage.php";

if (empty($_POST['name'])) {
  http_response_code(400);
  die(json_encode(array("message" => "name is require")));
}
if (empty($_POST['price'])) {
  http_response_code(400);
  die(json_encode(array("message" => "price is require")));
}
if (empty($_POST['quantity'])) {
  http_response_code(400);
  die(json_encode(array("message" => "quantity is require")));
}
if (empty($_POST['category_id'])) {
  http_response_code(400);
  die(json_encode(array("message" => "category_id is require")));
}
$Product->name = $_POST['name'];
$Product->desc = $_POST['desc'];
$Product->price = $_POST['price'];
$Product->howToUse = $_POST['howToUse'];
$Product->preserve = $_POST['preserve'];
$Product->img = $image_file["name"];
$Product->mass = $_POST['mass'];
$Product->ingredient = $_POST['ingredient'];
$Product->trademark = $_POST['trademark'];
$Product->makeIn = $_POST['makeIn'];
$Product->category_id = $_POST['category_id'];
$Product->quantity = $_POST['quantity'];
$Product->expiredAt = $_POST['expiredAt'];

print_r($Product);
if ($Product->create()) {
  echo json_encode(
    array('message' => 'Product Created')
  );
} else {
  echo json_encode(
    array('message' => 'Product Not Created')
  );
}
