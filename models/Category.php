<?php
class Category
{

  public $id;
  public $name;
  public $name_code;
  public $isDeleted;

  public $table_name = "category";
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
    if ($stm->execute() && $stm->rowCount() > 0) {
      while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
        $this->id = $row['id'];
        $this->name = $row['name'];
        $this->name_code = $row['name_code'];
        $this->isDeleted = $row['isDeleted'];
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
      name_code = :name_code';
    $stmt = $this->con->prepare($query);

    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':name_code', $this->name_code);
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
      name_code = :name_code
    WHERE
      id = :id';
    $stmt = $this->con->prepare($query);

    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':name_code', $this->name_code);
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
