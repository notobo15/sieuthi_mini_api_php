<?php
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Category.php";

$db = new ConnectDB();
$conn = $db->getConnect();
$Category = new Category($conn);

$result = $Category->getList();
$arr = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
  extract($row);
  $cat_item = array(
    'id' => $id,
    'name' => $name,
    'name_code' => $name_code,
    'isDeleted' => $isDeleted
  );
  $arr[] = $cat_item;
}
echo json_encode($arr);
