<?php
$query = "SELECT * FROM  account ;";
  $stmt = $mysql->prepare($query);

  $result = $mysql->query($query);
  $item = null;
  if ($result) {
    while ($row = $result->fetch_assoc()) {
      extract($row);
      $item = array(
        'id' => $id,
        'account_id' => $account_id,
        'name' => $name,
        'password' => $password,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'phone' => $phone,
        'birth_date' => $birth_date,
        'delivery_address' => $delivery_address,
        'gender' => $gender,
        'group_id' => $group_id,
        'isDeleted' => $isDeleted,
        'createAt' => $createAt,
        'modifiedAt' => $modifiedAt
      );
    }
    print_r($item);