<?php
// name file image
$image_file = $_FILES["img"];
// Exit if no file uploaded
if (!isset($image_file)) {
  die('No file uploaded.');
}

$imageFileType = pathinfo($image_file["name"], PATHINFO_EXTENSION);
$allowtypes = array('jpg', 'png', 'jpeg', 'gif', 'jfif');
if (!in_array($imageFileType, $allowtypes)) {
  http_response_code(400);
  die(json_encode(array("status" => 0, "message" => "Only JPG, JPEG, PNG, and GIF files are allowed.")));
}
// Exit if is not a valid image file
// Check file size (you can customize this)
if ($_FILES["img"]["size"] > 10 * 1024 * 1024) {
  http_response_code(400);
  die(json_encode(array("status" => 0, "message" => "Your file is too large. It should be less than 10MB.")));
}


// Move the temp image file to the images/ directory
$isSuccess = move_uploaded_file(
  // Temp image location
  $image_file["tmp_name"],
  // New image location
  "../../images/products/" . $image_file["name"]
);
if (!$isSuccess) {
  http_response_code(400);
  die(json_encode(array("status" => 0, "message" => "There was an error uploading your file.")));
}
