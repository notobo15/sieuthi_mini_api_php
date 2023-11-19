<?php
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Account.php";

require_once "../../auth/auth.php";

$db = new ConnectDB();
$conn = $db->getConnect();
$account = new Account($conn);
$id = isset($_GET['id']) ? $_GET['id'] : die();
if ($account->deleteById($id) && $id) {

  print_r(json_encode(array("message" => "delete success")));
} else {
  http_response_code(400);
  print_r(json_encode(array("status" => 0,  "message" => "Failed to delete product.")));
}
