<?php
class Product
{

  public $id;
  public $name;
  public $desc;
  public $price;
  public $img;
  public $mass;
  public $ingredient;
  public $howToUse;
  public $preserve;
  public $trademark;
  public $makeIn;
  public $category_id;
  public $quantity;
  public $isDeleted;
  public $expiredAt;
  public $createAt;

  public $table_name = "product";
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
  public function getListByCategoryId($category_id)
  {
    $query = 'SELECT * FROM ' . $this->table_name . ' WHERE category = ' . $category_id;
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
        $this->desc = $row['desc'];
        $this->price = $row['price'];
        $this->img = $row['img'];
        $this->mass = $row['mass'];
        $this->ingredient = $row['ingredient'];
        $this->howToUse = $row['howToUse'];
        $this->trademark = $row['trademark'];
        $this->makeIn = $row['makeIn'];
        $this->category_id = $row['category_id'];
        $this->isDeleted = $row['isDeleted'];
        $this->createAt = $row['createAt'];
        $this->expiredAt = $row['expiredAt'];
        $this->quantity = $row['quantity'];

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
      price = :price,
      mass = :mass,
      img = :img,
      category_id = :category_id,
      quantity = :quantity,
      preserve = :preserve,
      ingredient = :ingredient,  
      howToUse = :howToUse,
      trademark = :trademark,
      makeIn = :makeIn,
      expiredAt = :expiredAt,
      `desc` = :desc;';
    $stmt = $this->con->prepare($query);

    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':img', $this->img);
    $stmt->bindParam(':preserve', $this->preserve);
    $stmt->bindParam(':quantity', $this->quantity);
    $stmt->bindParam(':mass', $this->mass);
    $stmt->bindParam(':category_id', $this->category_id);
    $stmt->bindParam(':ingredient', $this->ingredient);
    $stmt->bindParam(':howToUse', $this->howToUse);
    $stmt->bindParam(':trademark', $this->trademark);
    $stmt->bindParam(':makeIn', $this->makeIn);
    $stmt->bindParam(':desc', $this->desc);
    $stmt->bindParam(':expiredAt', $this->expiredAt);
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
      price = :price,
      mass = :mass,
      img = :img,
      category_id = :category_id,
      quantity = :quantity,
      preserve = :preserve,
      ingredient = :ingredient,  
      howToUse = :howToUse,
      trademark = :trademark,
      makeIn = :makeIn,
      expiredAt = :expiredAt,
      `desc` = :desc
    WHERE
      id = :id';
    $stmt = $this->con->prepare($query);

    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':img', $this->img);
    $stmt->bindParam(':preserve', $this->preserve);
    $stmt->bindParam(':quantity', $this->quantity);
    $stmt->bindParam(':mass', $this->mass);
    $stmt->bindParam(':category_id', $this->category_id);
    $stmt->bindParam(':ingredient', $this->ingredient);
    $stmt->bindParam(':howToUse', $this->howToUse);
    $stmt->bindParam(':trademark', $this->trademark);
    $stmt->bindParam(':makeIn', $this->makeIn);
    $stmt->bindParam(':desc', $this->desc);
    $stmt->bindParam(':expiredAt', $this->expiredAt);
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
