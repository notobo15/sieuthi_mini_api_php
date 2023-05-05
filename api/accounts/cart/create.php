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
// unset($_SESSION['cart']);
if (empty($_POST['product_id'])) {
  http_response_code(400);
  die(json_encode(array("message" => "product_id is require")));
}
if (empty($_POST['quantity'])) {
  http_response_code(400);
  die(json_encode(array("message" => "quantity is require")));
}
$cart = array(
  'product_id' => $_POST['product_id'],
  'quantity' => $_POST['quantity'],
  'price' => $_POST['price']

);

if (empty($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}
// $_SESSION['cart'] = [];

if (count($_SESSION['cart'])  == 0) {
  $_SESSION['cart'][] = $cart;
} else {
  $isExist = 0;
  for ($i = 0; $i < count($_SESSION['cart']); $i++) {
    if ($_SESSION['cart'][$i]["quantity"] <= 1 && $cart["quantity"] < 1) {
      $isExist = 1;
    } elseif ($cart["product_id"] == $_SESSION['cart'][$i]["product_id"]) {
      $_SESSION['cart'][$i]["quantity"] += $cart["quantity"];
      $isExist = 1;
      break;
    }
  }
  if ($isExist == 0) {
    $_SESSION['cart'][] = $cart;
  }
}
// print_r($_SES  SION['cart']);

echo json_encode(
  array('message' => 'Success', "cart" => $_SESSION['cart']),

);
