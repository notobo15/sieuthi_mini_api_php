<?php
// Headers
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
require_once "../../../configs/ConnectDB.php";
require_once "../../../configs/headers.php";
require_once "../../../models/Account.php";
// require_once "../../../auth/auth.php";
$db = new ConnectDB();
$conn = $db->getConnect();
$account = new Account($conn);

$isSuccess = false;
if (isset($_SESSION['cart'])) {
  $query_order = "INSERT INTO orders SET account_id = ?";
  $stm = $conn->prepare($query_order);
  $stm->bindParam(1, $_SESSION['account']["id"]);
  if ($stm->execute()) {
    $order_id = $conn->lastInsertId();
    foreach ($_SESSION['cart'] as $value) {
      $query_detail = "INSERT INTO order_detail SET order_id = ?, product_id = ?, quantity = ?, price =?;";
      $stmt = $conn->prepare($query_detail);
      $stmt->bindParam(1, $order_id);
      $stmt->bindParam(2, $value['product_id']);
      $stmt->bindParam(3, $value['quantity']);
      $stmt->bindParam(4, $value['price']);
      if ($stmt->execute()) {
        $isSuccess = true;
      }
    }
  }
}

if ($isSuccess) {
  $_SESSION['cart'] = [];
  echo json_encode(
    array('message' => 'Order Created')
  );
} else {
  echo json_encode(
    array('message' => 'Order Not Created')
  );
}
