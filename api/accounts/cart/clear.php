<?php
require_once "../../../configs/ConnectDB.php";
require_once "../../../configs/headers.php";
require_once "../../../models/Account.php";
// require_once "../../../auth/auth.php";

if (isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
  echo json_encode($_SESSION['cart']);
} else {
  echo json_encode(array("message" => "cart rong"));
}
