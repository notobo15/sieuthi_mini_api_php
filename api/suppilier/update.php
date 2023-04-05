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
if (empty($_POST['id'])) {
  http_response_code(400);
  die(json_encode(array("message" => "id is require")));
}

// Set ID to UPDATE
$Suppilier->id = $_POST['id'];
$Suppilier->name = $_POST['name'];
$Suppilier->address = $_POST['address'];
$Suppilier->phone = $_POST['phone'];
if ($Suppilier->updateById()) {
  echo json_encode(
    array('message' => 'Suppilier Updated')
  );
} else {
  echo json_encode(
    array('message' => 'Suppilier not updated')
  );
}
