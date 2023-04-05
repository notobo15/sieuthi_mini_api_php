<?php
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Suppilier.php";

$db = new ConnectDB();
$conn = $db->getConnect();
$Suppilier = new Suppilier($conn);
if (empty($_GET['id'])) {
  http_response_code(400);
  die(json_encode(array("message" => "id is require")));
}
$id = isset($_GET['id']);
if ($Suppilier->getSingleById($id) && $id) {
  $arr = array(
    'id' => $Suppilier->id,
    'name' => $Suppilier->name,
    'address' => $Suppilier->address,
    'phone' => $Suppilier->phone,
    'isDeleted' => $Suppilier->isDeleted,
  );
  print_r(json_encode($arr));
} else {
  http_response_code(200);
  print_r(json_encode(array("message" => "not found")));
}
