<?php
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Product.php";
  header('Access-Control-Allow-Methods: GET');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$db = new ConnectDB();
$conn = $db->getConnect();
$product = new Product($conn);
$id = isset($_GET['id']) ? $_GET['id'] : die();
if ($product->getSingleById($id) && $id) {
  $arr = array(
    'id' => $product->id,
    'name' => $product->name,
    'desc' => $product->desc,
    'price' => $product->price,
    'img' => $product->img,
    'mass' => $product->mass,
    'ingredient' => $product->ingredient,
    'howToUse' => $product->howToUse,
    'trademark' => $product->trademark,
    'makeIn' => $product->makeIn,
    'category_id' => $product->category_id,
    'quantity' => $product->quantity,
    'isDeleted' => $product->isDeleted,
    'createAt' => $product->createAt,
    'expiredAt' => $product->expiredAt,
  );
  print_r(json_encode($arr));
} else {
  http_response_code(200);
  print_r(json_encode(array("message" => "not found")));
}
