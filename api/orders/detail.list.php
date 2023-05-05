<?php
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Category.php";

$db = new ConnectDB();
$conn = $db->getConnect();
$query = "SELECT subq.*, T2.name, T2.makeIn FROM product T2 
            INNER JOIN  
            (SELECT T1.product_id, SUM(T1.quantity) as totalQuantity FROM order_detail T1 
            GROUP BY T1.product_id) subq ON subq.product_id = T2.id;";
$stm = $conn->prepare($query);
if ($stm->execute()) {
  while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $cat_item = array(
      'product_id' => $product_id,
      'name' => $name,
      'totalQuantity' => $totalQuantity,
      'makeIn' => $makeIn,
    );
    $arr[] = $cat_item;
  }
}
echo json_encode($arr);
