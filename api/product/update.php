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
$image_file = $_FILES["img"];

// Exit if no file uploaded
if (!isset($image_file)) {
  die('No file uploaded.');
}

$imageFileType = pathinfo($image_file["name"], PATHINFO_EXTENSION);
$allowtypes = array('jpg', 'png', 'jpeg', 'gif');
if (!in_array($imageFileType, $allowtypes)) {
  die('Chỉ được upload các định dạng JPG, PNG, JPEG, GIF');
}
// Exit if is not a valid image file
$image_type = exif_imagetype($image_file["tmp_name"]);
if (!$image_type) {
  die('Uploaded file is not an image.');
}

// Move the temp image file to the images/ directory
move_uploaded_file(
  // Temp image location
  $image_file["tmp_name"],

  // New image location
  "../../images/" . $image_file["name"]
);

// Set ID to UPDATE
$Product->id = $_POST['id'];
$Product->name = $_POST['name'];
$Product->desc = $_POST['desc'];
$Product->price = $_POST['price'];
$Product->img = $image_file["name"];
$Product->mass = $_POST['mass'];
$Product->ingredient = $_POST['ingredient'];
$Product->trademark = $_POST['trademark'];
$Product->makeIn = $_POST['makeIn'];
$Product->category_id = $_POST['category_id'];
$Product->quantity = $_POST['quantity'];
$Product->expiredAt = $_POST['expiredAt'];
if ($Product->updateById()) {
  echo json_encode(
    array('message' => 'Product Updated')
  );
} else {
  echo json_encode(
    array('message' => 'Product not updated')
  );
}

