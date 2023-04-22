<?php
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Discount.php";

$db = new ConnectDB();
$conn = $db->getConnect();
$Discount = new Discount($conn);

$result = $Discount->getList();
$arr = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
  extract($row);
  $cat_item = array(
    'id' => $id,
    'name' => $name,
    'price_per' => $price_per,
    'start_date' => $start_date,
    'end_date' => $end_date,
    'createAt' => $createAt,
    'isDeleted' => $isDeleted,
  );
  $arr[] = $cat_item;
}
echo json_encode($arr);
