<?php
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Product.php";
require_once "../../models/Category.php";
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$db = new ConnectDB();
$conn = $db->getConnect();
$product = new Product($conn);
$Category = new Category($conn);


$id = isset($_GET['id']) ? $_GET['id'] : die();
if ($product->getSingleById($id)) {
  $arr = array(
    'id' => $product->id,
    'name' => $product->name,
    'desc' => $product->desc,
    'price' => (int)$product->price,
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
    'discountedPrice' => $product->discountedPrice,
    'price_per' => $product->price_per,
    'expiredAt' => $product->expiredAt,
  );
  $images = $product->getListImagesById($arr['id']);
  $list = [];
  // $list[] = $product->img;
  while ($row = $images->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $list[] = $image_name;
  }
  $arr['images'] = $list;
  $Category->getSingleById($arr['category_id']);
  $arr['category_name'] = $Category->name;
  print_r(json_encode($arr));
} else {
  http_response_code(404);
  print_r(json_encode(array("status" => 0, "message" => "Product not found")));
}
