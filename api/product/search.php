<?php
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Product.php";
require_once "../../models/Category.php";

$db = new ConnectDB();
$conn = $db->getConnect();
$product = new Product($conn);
$Category = new Category($conn);
// if (empty($_GET['key'])) {
//   http_response_code(400);   
//   die(json_encode(array("message" => "key is require")));
// }
$arr = [];
if (!empty($_GET['key'])) {
  $result = $product->searchByKey($_GET['key']);
}
if (!empty($_GET['cate'])) {
  $Category->getSingleById($_GET['cate']);
  $arr["category_name"] =  $Category->name;
  $result = $product->searchByCategory($_GET['cate']);
}
if (!empty($_GET['key']) && !empty($_GET['cate'])) {
  $result = $product->searchByKeyAndCate(isset($_GET['key']), isset($_GET['cate']));
}


$products = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
  extract($row);
  $cat_item = array(
    'id' => $id,
    'name' => $name,
    'desc' => $desc,
    'price' => $price,
    'img' => $img,
    'mass' => $mass,
    'ingredient' => $ingredient,
    'howToUse' => $howToUse,
    'trademark' => $trademark,
    'makeIn' => $makeIn,
    'category_id' => $category_id,
    'quantity' => $quantity,
    'isDeleted' => $isDeleted,
    'createAt' => $createAt,
    'discountedPrice' => $discountedPrice,
    'price_per' => $price_per,
    'expiredAt' => $expiredAt,
  );
  $products[] = $cat_item;
}
// $arr[] = array("products" => $products);

$arr["totalNumber"] =  count($products);
if (!empty($_GET['page'])) {

  $arr["page"] = (int) $_GET['page'];
  $arr["pageSize"] =  8;
  $arr["totalPage"] = ceil($arr["totalNumber"] / $arr["pageSize"]);
  $indexPage = 0;
  if ($arr["page"] != 1) {
    $indexPage = (($arr["page"] - 1) * $arr["pageSize"]);
  }
  $products = array_slice($products, $indexPage, $arr["pageSize"]);
  // $result =   $product->searchByKeyAndCate(isset($_GET['key']), isset($_GET['cate']));
}
$arr["products"] =  $products;

print_r(json_encode($arr));
