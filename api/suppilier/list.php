<?php
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Suppilier.php";

$db = new ConnectDB();
$conn = $db->getConnect();
$Suppilier = new Suppilier($conn);

$result = $Suppilier->getList();
$arr = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
  extract($row);
  $cat_item = array(
    'id' => $id,
    'name' => $name,
    'address' => $address,
    'phone' => $phone,
    'isDeleted' => $isDeleted
  );
  $arr[] = $cat_item;
}
echo json_encode($arr);
