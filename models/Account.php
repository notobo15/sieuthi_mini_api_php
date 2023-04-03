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
    $query = 'SELECT * FROM account';
    $stm = $this->con->prepare($query);
    $stm->execute();
    return $stm;
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
        JOIN group_permission T2 ON T1.per_id = T2.permission_id 
          JOIN groups T3 ON T3.group_id = T2.group_id
          JOIN account t4 ON t3.group_id = t4.group_id
        WHERE T4.id = ;';
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
      name = :name,
      first_name = :first_name,
      last_name = :last_name,
      phone = :phone,
      birth_date = :birth_date,
      delivery_address = :delivery_address,
      gender = :gender
      WHERE
      id = :id';
    $stmt = $this->con->prepare($query);

    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':first_name', $this->first_name);
    $stmt->bindParam(':last_name', $this->last_name);
    $stmt->bindParam(':phone', $this->phone);
    $stmt->bindParam(':birth_date', $this->birth_date);
    $stmt->bindParam(':delivery_address', $this->delivery_address);
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

    $stmt->bindParam(':password', $this->password);
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
