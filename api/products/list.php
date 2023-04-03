<?php
require_once "../../configs/ConnectDB.php";
require_once "../../configs/headers.php";
require_once "../../models/Account.php";
$db = new ConnectDB();
$conn = $db->getConnect();
$account = new Account($conn);
$result = $account->getList();
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
  extract($row);
  $item = array(
    ''
  );
  echo $id;
  echo $name;
}

echo $result->rowCount();
//   $arr = [];
//   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     extract($row);
//     $cat_item = array(
//       // 'id' => $id,
//       'product_id' => $product_id,
//       'name' => $name
//     );
//     $arr[] = $cat_item;
//   }
//   echo json_encode($arr);
// } catch (PDOException $e) {
//   echo "Error: " . $e->getMessage();
// }
// $conn = null;
