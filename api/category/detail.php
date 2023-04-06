<?php
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Category.php";
require_once "../../models/Product.php";

$db = new ConnectDB();
$conn = $db->getConnect();
$Category = new Category($conn);
$Product = new Product($conn);



if (empty($_GET['id'])) {
  http_response_code(400);
  die(json_encode(array("message" => "id is require")));
}

$result = $Product->getListByCategoryId($_GET['id']);
$arr_products = [];
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
    'expiredAt' => $expiredAt,
  );
  $arr_products[] = $cat_item;
}


$id = isset($_GET['id']);
if ($Category->getSingleById($id) && $id) {
  $arr = array(
    'id' => $Category->id,
    'name' => $Category->name,
    'address' => $Category->name_code,
    'isDeleted' => $Category->isDeleted,
    'products' => $arr_products
  );



  print_r(json_encode($arr));
} else {
  http_response_code(200);
  print_r(json_encode(array("message" => "not found")));
}
