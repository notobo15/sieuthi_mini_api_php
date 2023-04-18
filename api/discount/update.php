<?php

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
include_once "../../configs/ConnectDB.php";
include_once "../../configs/headers.php";
include_once "../../models/Discount.php";
require_once "../../auth/auth.php";
$db = new ConnectDB();
$conn = $db->getConnect();
$Discount = new Discount($conn);


// Set ID to UPDATE
$Discount->id = $_POST['id'];
$Discount->name = $_POST['name'];
$Discount->price_per = $_POST['price_per'];
$Discount->product_id = $_POST['product_id'];
$Discount->start_date = $_POST['start_date'];
$Discount->end_date = $_POST['end_date'];
if ($Discount->updateById()) {
  echo json_encode(
    array('message' => 'Discount Updated')
  );
} else {
  echo json_encode(
    array('message' => 'Discount not updated')
  );
}
