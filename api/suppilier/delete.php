<?php
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Suppilier.php";
require_once "../../auth/auth.php";
$db = new ConnectDB();
$conn = $db->getConnect();
$Suppilier = new Suppilier($conn);
// Get raw posted data
$data = json_decode(file_get_contents("php://input"));
if (empty($_POST['id'])) {
  http_response_code(400);
  die(json_encode(array("message" => "id is require")));
}
// Set ID to UPDATE
$Suppilier->id = $_POST['id'];
if ($Suppilier->delete()) {
  http_response_code(200);
  print_r(json_encode(array("message" => "delete success")));
} else {
  http_response_code(400);
  print_r(json_encode(array("message" => "not found")));
}
