<?php
class Discount
{

  public $id;
  public $name;
  public $price_per;
  public $start_date;
  public $end_date;
  public $product_id;
  public $createAt;
  public $isDeleted;

  public $table_name = "discount";
  public $con;

  public function __construct($db)
  {
    $this->con = $db;
  }
  public function getList()
  {
    $query = 'SELECT * FROM ' . $this->table_name;
    $stm = $this->con->prepare($query);
    $stm->execute();
    return $stm;
  }

  public function getSingleById($id)
  {
    $query = 'SELECT * FROM ' . $this->table_name . ' where id = ? and isDeleted = 0;';
    $stm = $this->con->prepare($query);
    $stm->bindParam(1, $id);
    if ($stm->execute()) {
      while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
        $this->id = $row['id'];
        $this->name = $row['name'];
        $this->price_per = $row['price_per'];
        $this->start_date = $row['start_date'];
        $this->end_date = $row['end_date'];
        $this->isDeleted = $row['isDeleted'];
        $this->createAt = $row['createAt'];
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
      price_per = :price_per,
      end_date = :end_date,
      start_date = :start_date;';
    $stmt = $this->con->prepare($query);

    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':price_per', $this->price_per);
    $stmt->bindParam(':end_date', $this->end_date);
    $stmt->bindParam(':start_date', $this->start_date);
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
    price_per = :price_per,
    end_date = :end_date,
    start_date = :start_date
    WHERE
      id = :id';
    $stmt = $this->con->prepare($query);

    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':price_per', $this->price_per);
    $stmt->bindParam(':end_date', $this->end_date);
    $stmt->bindParam(':start_date', $this->start_date);
    $stmt->bindParam(':id', $this->id);
    print_r($this);
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

  public function delete()
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
  public function unDelete()
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
