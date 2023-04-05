<?php
// Headers
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
include_once "../../configs/headers.php";
include_once '../../configs/ConnectDB.php';
include_once '../../models/Suppilier.php';
require_once "../../auth/auth.php";
$db = new ConnectDB();
$conn = $db->getConnect();
$Suppilier = new Suppilier($conn);
require_once "../../configs/uploadImage.php";

// if (empty($_POST['name'])) {
//   http_response_code(400);
//   die(json_encode(array("message" => "name is require")));
// }
// if (empty($_POST['price'])) {
//   http_response_code(400);
//   die(json_encode(array("message" => "price is require")));
// }
// if (empty($_POST['quantity'])) {
//   http_response_code(400);
//   die(json_encode(array("message" => "quantity is require")));
// }
// if (empty($_POST['category_id'])) {
//   http_response_code(400);
//   die(json_encode(array("message" => "category_id is require")));
// }
$Suppilier->id = $_POST['id'];
$Suppilier->name = $_POST['name'];
$Suppilier->address = $_POST['address'];
$Suppilier->phone = $_POST['phone'];
$Suppilier->isDeleted = $_POST['isDeleted'];

print_r($Suppilier);
if ($Suppilier->create()) {
  echo json_encode(
    array('message' => 'Suppilier Created')
  );
} else {
  echo json_encode(
    array('message' => 'Suppilier Not Created')
  );
}
