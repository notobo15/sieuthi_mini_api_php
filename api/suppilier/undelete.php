<?php

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
include_once "../../configs/ConnectDB.php";
include_once "../../configs/headers.php";
include_once "../../models/Suppilier.php";
require_once "../../auth/auth.php";
$db = new ConnectDB();
$conn = $db->getConnect();
$Suppilier = new Suppilier($conn);
$data = json_decode(file_get_contents("php://input"));

if (empty($_POST['id'])) {
  http_response_code(400);
  die(json_encode(array("message" => "id is require")));
}

$Suppilier->id = $_POST['id'];
if ($Suppilier->unDelete()) {
  echo json_encode(
    array('message' => 'Suppilier is unblocked')
  );
} else {
  echo json_encode(
    array('message' => 'not work')
  );
}
