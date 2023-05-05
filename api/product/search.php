<?php
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Product.php";
require_once "../../models/Category.php";

$db = new ConnectDB();
$conn = $db->getConnect();
$product = new Product($conn);
$Category = new Category($conn);
if (isset($_GET['key'])) {
  $_GET['key'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_GET['key'])));
}
$arr = [];
if (!empty($_GET['key'])) {
  if (!empty($_GET['sort'])) {
    $result = $product->searchByKey($_GET['key'], $_GET['sort']);
  } else {
    $result = $product->searchByKey($_GET['key']);
  }
}
if (!empty($_GET['cate'])) {
  $Category->getSingleById($_GET['cate']);
  $arr["category_name"] =  $Category->name;

  if (!empty($_GET['sort'])) {
    $result = $product->searchByCategory($_GET['cate'], $_GET['sort']);
  } else {
    $result = $product->searchByCategory($_GET['cate']);
  }
}

if (!empty($_GET['key']) && !empty($_GET['cate'])) {
  if (!empty($_GET['sort'])) {
    $result = $product->searchByKeyAndCate(($_GET['key']), ($_GET['cate']), ($_GET['sort']));
  } else {
    $result = $product->searchByKeyAndCate(($_GET['key']), ($_GET['cate']));
  }
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
