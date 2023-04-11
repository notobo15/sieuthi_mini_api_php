<?php

class Order
{
  public $id;
  public $status;
  public $orderDate;
  public $isDeleted;
  public $con;
  public $table_name = "orders";
  public function __construct($db)
  {
    $this->con = $db;
  }
  public function getList()
  {
    $query = 'SELECT * FROM ' . $this->table_name . ' WHERE isDeleted = 0;';
    $stm = $this->con->prepare($query);
    $stm->execute();
    return $stm;
  }

  public function getOrderById()
  {
    $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
    $stm = $this->con->prepare($query);
    $stm->bindParam(1, $this->id);
    if ($stm->execute() && $stm->rowCount() > 0) {
      while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
        $this->id = $row['id'];
        $this->orderDate = $row['order_date'];
        $this->status = $row['status'];
        $this->isDeleted = $row['isDeleted'];
        return true;
      }
    } else {
      return false;
    }
  }

  public function checkOrderById($id)
  {
    $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
    $stm = $this->con->prepare($query);
    $stm->bindParam(1, $id);
    if ($stm->execute() && $stm->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function changeStatus()
  {
    $query = "UPDATE " . $this->table_name . " SET status = ? WHERE id = ?";
    $stm = $this->con->prepare($query);
    $stm->bindParam(1, $this->status);
    $stm->bindParam(2, $this->id);
    if ($stm->execute() && $stm->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
}
