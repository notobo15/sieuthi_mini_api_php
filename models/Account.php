<?php
class Account
{
  public $table_name = "account";


  public $id;
  public $account_id;
  public $name;
  public $password;
  public $first_name;
  public $last_name;
  public $phone;
  public $birth_date;
  public $provinceCode;
  public $districtCode;
  public $wardCode;
  public $delivery_address;
  public $gender;
  public $group_id;
  public $isDeleted;
  public $createAt;
  public $modifiedAt;
  public $permissions;
  public $con = null;
  public function __construct($db)
  {
    $this->con = $db;
  }


  public function getList()
  {
    // $query = 'SELECT * FROM ' . $this->table_name . ' WHERE isDeleted = 0;';
    $query = 'SELECT * FROM ' . $this->table_name;

    $stm = $this->con->prepare($query);
    $stm->execute();
    return $stm;
  }

  public function getListOrder()
  {
    $query = "SELECT T1.id, T1.order_date, T1.status, (T2.quantity) * T2.price AS totalPrice, GROUP_CONCAT(T3.name, ' ( x',  T2.quantity, ' )<br/>') as product_detail
    FROM orders T1 
    JOIN order_detail T2 ON T1.id = T2.order_id 
    JOIN product T3 ON T3.id = T2.product_id 
    WHERE T1.account_id = '$this->id'
    GROUP BY T1.id
    ORDER BY  T1.id DESC ;";
    $stm = $this->con->prepare($query);
    $stm->execute();
    $arr_order = [];
    while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $item = array(
        'id' => $id,
        'status' => $status,
        'order_date' => $order_date,
        'totalPrice' => $totalPrice,
        'product_detail' => $product_detail,
      );
      $arr_order[] = $item;
    }
    return $arr_order;
  }

  public function getOrderAll()
  {
    $query = "SELECT T1.id, T1.order_date, T1.status,(T2.quantity)* T2.price AS totalPrice, GROUP_CONCAT(T3.name, ' ( x',  T2.quantity, ' )<br/>') as product_detail
    FROM orders T1 
    JOIN order_detail T2 ON T1.id = T2.order_id 
    JOIN product T3 ON T3.id = T2.product_id 
    GROUP BY T1.id
    ORDER BY  T1.id DESC";
    $stm = $this->con->prepare($query);
    $stm->execute();
    $arr_order = [];
    while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $item = array(
        'id' => $id,
        'status' => $status,
        'order_date' => $order_date,
        'totalPrice' => $totalPrice,
        'product_detail' => $product_detail,
      );
      $arr_order[] = $item;
    }
    return $arr_order;
  }
  public function checkUserNameExist()
  {
    $query = 'SELECT * FROM ' . $this->table_name . ' where name = ?';
    $stm = $this->con->prepare($query);
    $stm->bindParam(1, $this->name);
    if ($stm->execute() && $stm->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
  public function login()
  {
    $query = 'SELECT * FROM ' . $this->table_name . ' where name = ? and password = MD5(?)';
    $stm = $this->con->prepare($query);
    $stm->bindParam(1, $this->name);
    $stm->bindParam(2, $this->password);
    if ($stm->execute() && $stm->rowCount() > 0) {
      while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
        $this->id = $row['id'];
        $this->account_id = $row['account_id'];
        $this->name = $row['name'];
        $this->password = $row['password'];
        $this->first_name = $row['first_name'];
        $this->last_name = $row['last_name'];
        $this->phone = $row['phone'];
        $this->birth_date = $row['birth_date'];
        $this->delivery_address = $row['delivery_address'];
        $this->gender = $row['gender'];
        $this->group_id = $row['group_id'];
        $this->isDeleted = $row['isDeleted'];
        $this->createAt = $row['createAt'];
        $this->modifiedAt = $row['modifiedAt'];

        $q = 'SELECT T1.code_name FROM permission T1 
        JOIN groups_permission T2 ON T1.per_id = T2.permission_id
          JOIN `groups` T3 ON T3.group_id = T2.group_id
          JOIN account T4 ON T3.group_id = T4.group_id
        WHERE T4.id = ?;';

        $stm2 = $this->con->prepare($q);
        $stm2->bindParam(1, $this->id);
        if ($stm2->execute()) {
          $arr = array();
          while ($row = $stm2->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $arr[] = $code_name;
          }
        }
        $this->permissions = $arr;
        return true;
      }
    } else {
      return false;
    }
  }
  public function getSingleById($id)
  {
    $query = 'SELECT * FROM ' . $this->table_name . ' where id = ?';
    $stm = $this->con->prepare($query);
    $stm->bindParam(1, $id);
    if ($stm->execute()) {
      while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
        $this->id = $row['id'];
        $this->account_id = $row['account_id'];
        $this->name = $row['name'];
        $this->password = $row['password'];
        $this->first_name = $row['first_name'];
        $this->last_name = $row['last_name'];
        $this->phone = $row['phone'];
        $this->birth_date = $row['birth_date'];
        $this->delivery_address = $row['delivery_address'];
        $this->gender = $row['gender'];
        $this->group_id = $row['group_id'];
        $this->isDeleted = $row['isDeleted'];
        $this->createAt = $row['createAt'];
        $this->modifiedAt = $row['modifiedAt'];



        return true;
      }
    } else {
      return false;
    }
  }

  public function create()
  {
    $query = 'INSERT INTO ' .
      $this->table_name . '
    SET
      name = :name, 
      password =:password,
      first_name = :first_name,
      last_name = :last_name,
      phone = :phone,
      birth_date = :birth_date,
      gender = :gender,
      delivery_address = :delivery_address
      ';
    $stmt = $this->con->prepare($query);
    $this->password = md5($this->password);

    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':password', $this->password);
    $stmt->bindParam(':first_name', $this->first_name);
    $stmt->bindParam(':last_name', $this->last_name);
    $stmt->bindParam(':phone', $this->phone);
    $stmt->bindParam(':birth_date', $this->birth_date);
    $stmt->bindParam(':gender', $this->gender);
    $stmt->bindParam(':delivery_address', $this->delivery_address);
    if ($stmt->execute()) {
      return true;
    }

    return false;
  }
  public function updateById()
  {
    $query = 'UPDATE ' .
      $this->table_name . '
    SET
      first_name = :first_name,
      last_name = :last_name,
      phone = :phone,
      birth_date = :birth_date,
      delivery_address = :delivery_address,
      gender = :gender,
      provinceCode = :provinceCode,
      districtCode = :districtCode,
      wardCode = :wardCode
      WHERE
      id = :id';
    $stmt = $this->con->prepare($query);

    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':first_name', $this->first_name);
    $stmt->bindParam(':last_name', $this->last_name);
    $stmt->bindParam(':phone', $this->phone);
    $stmt->bindParam(':birth_date', $this->birth_date);
    $stmt->bindParam(':provinceCode', $this->provinceCode);
    $stmt->bindParam(':delivery_address', $this->delivery_address);
    $stmt->bindParam(':districtCode', $this->districtCode);
    $stmt->bindParam(':wardCode', $this->wardCode);
    $stmt->bindParam(':gender', $this->gender);

    if ($stmt->execute() && $stmt->rowCount() > 0) {
      return true;
    } else {

      return false;
    }
  }

  public function deleteById($id)
  {
    $query = 'DELETE FROM ' . $this->table_name . ' WHERE id = :id';
    $stm = $this->con->prepare($query);
    $stm->bindParam(':id', $id);
    if ($stm->execute() && $stm->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function changePassword()
  {
    $query = 'UPDATE ' .
      $this->table_name . '
    SET
      password = :password
      WHERE
      id = :id';
    $stmt = $this->con->prepare($query);
    $password = (md5($this->password));
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':id', $this->id);
    if ($stmt->execute() && $stmt->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
  public function deleteAccount()
  {
    $query = 'UPDATE ' .
      $this->table_name . '
    SET
      isDeleted = 1
      WHERE
      id = :id';
    $stmt = $this->con->prepare($query);

    $stmt->bindParam(':id', $this->id);

    if ($stmt->execute() && $stmt->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
  public function unDeleteAccount()
  {
    $query = 'UPDATE ' .
      $this->table_name . '
    SET
      isDeleted = 0
      WHERE
      id = :id';
    $stmt = $this->con->prepare($query);
    $stmt->bindParam(':id', $this->id);
    if ($stmt->execute() && $stmt->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
}
