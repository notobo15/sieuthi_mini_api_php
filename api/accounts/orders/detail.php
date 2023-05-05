<?php
require_once "../../../configs/ConnectDB.php";
require_once "../../../configs/headers.php";
require_once "../../../models/Order.php";
require_once "../../../models/Product.php";

$db = new ConnectDB();
$conn = $db->getConnect();
$Order = new Order($conn);
$Product = new Product($conn);



if (empty($_GET['id'])) {
  http_response_code(400);
  die(json_encode(array("message" => "id is require")));
}
$Order->id = $_GET['id'];
$result = $Order->getOrderById();
$detail = [];
if ($Order->getOrderById()) {
}


if ($Order->getOrderById()) {
  $query = "SELECT T2.id, T2.quantity, T2.price, T3.name FROM orders T1
            JOIN order_detail T2 ON T1.id = T2.order_id
            JOIN product T3 ON T3.id = T2.order_id
            WHERE T1.id = ?;";
  $stm = $Order->con->prepare($query);
  $stm->bindParam(1, $Order->id);
  if ($stm->execute() && $stm->rowCount() > 0) {
    while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $item = array(
        'id' => $id,
        'quantity' => $quantity,
        'price' => $price,
        'name' => $name,

      );
      $detail[] = $item;
    }
  }
  $arr = array(
    'id' => $Order->id,
    'name' => $Order->status,
    'address' => $Order->orderDate,
    'isDeleted' => $Order->isDeleted,
    'products' => $detail
  );

  print_r(json_encode($arr));
} else {
  http_response_code(200);
  print_r(json_encode(array("message" => "not found")));
}
