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
$data = json_decode(file_get_contents("php://input"));

if (empty($_POST['id'])) {
  http_response_code(400);
  die(json_encode(array("message" => "id is require")));
}

$Category->id = $_POST['id'];
if ($Category->unDelete()) {
  echo json_encode(
    array('message' => 'Category is unblocked')
  );
} else {
  echo json_encode(
    array('message' => 'not work')
  );
}
