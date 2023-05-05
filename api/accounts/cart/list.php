<?php
require_once "../../../configs/ConnectDB.php";
require_once "../../../configs/headers.php";
require_once "../../../models/Account.php";
require_once "../../../models/Product.php";
// require_once "../../../auth/auth.php";

$db = new ConnectDB();
$conn = $db->getConnect();
// $total = 0;
for ($i = 0; $i < count($_SESSION['cart']); $i++) {
  $product = new Product($conn);
  $product->getSingleById($_SESSION['cart'][$i]['product_id']);
  $_SESSION['cart'][$i]['name'] = $product->name;
  if ($product->discountedPrice == null) {
    $_SESSION['cart'][$i]['price'] = $product->price;
  } else {
    $_SESSION['cart'][$i]['price'] = $product->discountedPrice;
  }
  $_SESSION['cart'][$i]['img'] = $product->img;
  // $total +=   $_SESSION['cart'][$i]['price'] *   $_SESSION['cart'][$i]['quantity'];
}
if (isset($_SESSION['cart'])) {
  echo json_encode($_SESSION['cart']);
} else {
  echo json_encode(array("message" => "cart rong"));
}
