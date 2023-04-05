<?php

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
include_once "../../configs/ConnectDB.php";
include_once "../../configs/headers.php";
include_once "../../models/Category.php";
require_once "../../auth/auth.php";
$db = new ConnectDB();
$conn = $db->getConnect();
$Category = new Category($conn);
if (empty($_POST['id'])) {
  http_response_code(400);
  die(json_encode(array("message" => "id is require")));
}

// Set ID to UPDATE
$Category->id = $_POST['id'];
$Category->name = $_POST['name'];
$Category->name_code = $_POST['name_code'];
if ($Category->updateById()) {
  echo json_encode(
    array('message' => 'Category Updated')
  );
} else {
  echo json_encode(
    array('message' => 'Category not updated')
  );
}
