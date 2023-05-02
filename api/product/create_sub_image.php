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
if (empty($_POST['id'])) {
  http_response_code(400);
  die(json_encode(array("message" => "id product is require")));
}
if (empty($_FILES['file'])) {
  http_response_code(400);
  die(json_encode(array("message" => "file product is require")));
}
// name file image
$image_file = $_FILES["file"];
// Exit if no file uploaded
if (!isset($image_file)) {
  die('No file uploaded.');
}

$imageFileType = pathinfo($image_file["name"], PATHINFO_EXTENSION);
$allowtypes = array('jpg', 'png', 'jpeg', 'gif', 'jfif');
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
  "../../images/products/" . $image_file["name"]
);
if ($Product->create_subimage($_POST['id'], $image_file["name"])) {
  $images = $Product->getListImagesById($_POST['id']);
  $list = [];
  while ($row = $images->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $list[] = $image_name;
  }
  echo json_encode(
    array('message' => 'image product is upload', 'images' => $list)
  );
} else {
  echo json_encode(
    array('message' => 'not work')
  );
}
