<?php
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Category.php";

$db = new ConnectDB();
$conn = $db->getConnect();
$Category = new Category($conn);
if (empty($_GET['id'])) {
  http_response_code(400);
  die(json_encode(array("message" => "id is require")));
}
$id = isset($_GET['id']);
if ($Category->getSingleById($id) && $id) {
  $arr = array(
    'id' => $Category->id,
    'name' => $Category->name,
    'address' => $Category->name_code,
    'isDeleted' => $Category->isDeleted,
  );
  print_r(json_encode($arr));
} else {
  http_response_code(200);
  print_r(json_encode(array("message" => "not found")));
}
