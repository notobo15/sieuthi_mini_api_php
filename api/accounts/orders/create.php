<?php
// Headers
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
require_once "../../../configs/ConnectDB.php";
require_once "../../../configs/headers.php";
require_once "../../../models/Account.php";
require_once "../../../auth/auth.php";
$db = new ConnectDB();
$conn = $db->getConnect();
$account = new Account($conn);

$data = json_decode(file_get_contents("php://input"));

if (isset($_SESSION['cart'])) {
  $query_order = "INSERT INTO orders SET account_id = ?";
  $stm = $conn->prepare($query_order);
  $stm->bindParam(1, $_SESSION['account']["id"]);
  if ($stm->execute()) {
    $order_id = $conn->lastInsertId();
    foreach ($_SESSION['cart'] as $value) {
      print_r($value['product_id']);
      print_r($value['quantity']);
      print_r($order_id);
      $query_detail = "INSERT INTO order_detail SET order_id = ?, product_id = ?, quantity = ?;";
      $stmt = $conn->prepare($query_detail);
      $stmt->bindParam(1, $order_id);
      $stmt->bindParam(2, $value['product_id']);
      $stmt->bindParam(3, $value['quantity']);
      if ($stmt->execute()) {
        print_r("ok");
      }
    }
  }
}

// Create Category
// if ($account->create()) {
//   echo json_encode(
//     array('message' => 'account Created')
//   );
// } else {
//   echo json_encode(
//     array('message' => 'account Not Created')
//   );
// }
