<?php
// Headers
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
include_once "../../configs/headers.php";
include_once '../../configs/ConnectDB.php';
include_once '../../models/Discount.php';
require_once "../../auth/auth.php";
$db = new ConnectDB();
$conn = $db->getConnect();
$Discount = new Discount($conn);
require_once "../../configs/uploadImage.php";

// if (empty($_POST['name'])) {
//   http_response_code(400);
//   die(json_encode(array("message" => "name is require")));
// }
// if (empty($_POST['price'])) {
//   http_response_code(400);
//   die(json_encode(array("message" => "price is require")));
// }
// if (empty($_POST['quantity'])) {
//   http_response_code(400);
//   die(json_encode(array("message" => "quantity is require")));
// }
// if (empty($_POST['category_id'])) {
//   http_response_code(400);
//   die(json_encode(array("message" => "category_id is require")));
// }
$Discount->name = $_POST['name'];
$Discount->product_id = $_POST['product_id'];
$Discount->price_per = $_POST['price_per'];
$Discount->end_date = $_POST['end_date'];
$Discount->start_date = $_POST['start_date'];

if ($Discount->create()) {
  echo json_encode(
    array('message' => 'Discount Created')
  );
} else {
  echo json_encode(
    array('message' => 'Discount Not Created')
  );
}
