<?php
require_once "../../../configs/ConnectDB.php";
require_once "../../../configs/headers.php";
require_once "../../../models/Account.php";
// require_once "../../../auth/auth.php";

if (empty($_POST['product_id'])) {
  http_response_code(400);
  die(json_encode(array("message" => "quantity is require")));
}
$temp = [];
for ($i = 0; $i < count($_SESSION['cart']); $i++) {
  if (($_SESSION['cart'][$i]['product_id']) == $_POST['product_id']) {
    continue;
  } else {
    $temp[] = $_SESSION['cart'][$i];
  }
}
$_SESSION['cart'] = $temp;
if (isset($_SESSION['cart'])) {
  echo json_encode($_SESSION['cart']);
} else {
  echo json_encode(array("message" => "cart rong"));
}
