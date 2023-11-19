<?php

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
include_once "../../configs/ConnectDB.php";
include_once "../../configs/headers.php";
include_once "../../models/Product.php";
// require_once "../../auth/auth.php";
$db = new ConnectDB();
$conn = $db->getConnect();
$Product = new Product($conn);

// name file image
if (isset($_FILES["img"])) {
  $Product->img = $_FILES["img"]["name"];
  require_once "../../configs/uploadImage.php";
}

// Set ID to UPDATE
$Product->id = $_POST['id'];
$Product->name = $_POST['name'];
$Product->desc = $_POST['desc'];
$Product->price = $_POST['price'];

$Product->mass = $_POST['mass'];
$Product->ingredient = $_POST['ingredient'];
$Product->trademark = $_POST['trademark'];
$Product->makeIn = $_POST['makeIn'];
$Product->category_id = $_POST['category_id'];
$Product->quantity = $_POST['quantity'];
$Product->expiredAt = $_POST['expiredAt'];
if ($Product->updateById()) {

  echo json_encode(
    array('status' => 1, 'message' => 'Product updated successfully', "data" => $Product)
  );
} else {
  echo json_encode(
    array('message' => 'Product not updated')
  );
}
