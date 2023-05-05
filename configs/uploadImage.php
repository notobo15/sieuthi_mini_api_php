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
