<?php
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Product.php";

$db = new ConnectDB();
$conn = $db->getConnect();
$product = new Product($conn);

$result = $product->getList();
$arr = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
  extract($row);
  $cat_item = array(
    'id' => $id,
    'name' => $name,
    'desc' => $desc,
    'price' => (int)$price,
    'img' => $img,
    'mass' => $mass,
    'ingredient' => $ingredient,
    'howToUse' => $howToUse,
    'trademark' => $trademark,
    'makeIn' => $makeIn,
    'category_id' => $category_id,
    'quantity' => $quantity,
    'isDeleted' => $isDeleted,
    'discountedPrice' => $discountedPrice,
    'price_per' => $price_per,
    'createAt' => $createAt,
    'expiredAt' => $expiredAt,
  );
  $arr[] = $cat_item;
}
echo json_encode($arr);
