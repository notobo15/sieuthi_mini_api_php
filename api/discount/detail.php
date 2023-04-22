<?php
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Product.php";
require_once "../../models/Discount.php";
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$db = new ConnectDB();
$conn = $db->getConnect();
$product = new Product($conn);
$Discount = new Discount($conn);


$id = isset($_GET['id']) ? $_GET['id'] : die();
if ($Discount->getSingleById($id)) {
  $arr = array(
    'id' => $Discount->id,
    'name' => $Discount->name,
    'price_per' => $Discount->price_per,
    'start_date' => $Discount->start_date,
    'end_date' => $Discount->end_date,
    'isDeleted' => $Discount->isDeleted,
    'createAt' => $Discount->createAt,
  );
  print_r(json_encode($arr));
} else {
  http_response_code(200);
  print_r(json_encode(array("message" => "not found")));
}
