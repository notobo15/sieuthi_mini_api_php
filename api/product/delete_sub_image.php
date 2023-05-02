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
if (empty($_POST['name'])) {
  http_response_code(400);
  die(json_encode(array("message" => "name image is require")));
}
if (empty($_POST['id'])) {
  http_response_code(400);
  die(json_encode(array("message" => "id product is require")));
}
if ($Product->delete_subimage($_POST['name'])) {
  $images = $Product->getListImagesById($_POST['id']);
  $list = [];
  while ($row = $images->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $list[] = $image_name;
  }
  echo json_encode(
    array('message' => 'image product is delete', 'images' => $list)
  );
} else {
  echo json_encode(
    array('message' => 'not work')
  );
}
