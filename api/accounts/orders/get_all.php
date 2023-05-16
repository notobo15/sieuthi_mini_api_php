<?php
require_once "../../../configs/ConnectDB.php";
require_once "../../../configs/headers.php";
require_once "../../../models/Account.php";
// require_once "../../../auth/auth.php";

$db = new ConnectDB();
$conn = $db->getConnect();
$account = new Account($conn);
$result = $account->getOrderAll();
echo json_encode($result);
