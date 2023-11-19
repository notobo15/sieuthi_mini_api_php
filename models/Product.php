<?php
class Product
{

  public $id;
  public $name;
  public $desc;
  public $price;
  public $discountedPrice;
  public $price_per;
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
    $query = "SELECT T1.*, T3.price_per, T1.price - (T3.price_per / 100 * T1.price) as `discountedPrice` FROM " . $this->table_name . " T1 LEFT JOIN discount_product T2 ON T2.product_id =T1.id LEFT JOIN discount T3 ON T3.id = T2.discount_id WHERE T1.isDeleted = 0;";
    $stm = $this->con->prepare($query);
    $stm->execute();
    return $stm;
  }
  public function getListByCategoryId($category_id)
  {
    $query = "SELECT T1.*, T3.price_per, T1.price - (T3.price_per / 100 * T1.price) as `discountedPrice` FROM " . $this->table_name . " T1 LEFT JOIN discount_product T2 ON T2.product_id =T1.id LEFT JOIN discount T3 ON T3.id = T2.discount_id WHERE T1.isDeleted = 0 and category_id =  $category_id;";
    // $query = 'SELECT * FROM ' . $this->table_name . ' WHERE category_id = ' . $category_id;
    $stm = $this->con->prepare($query);
    $stm->execute();
    return $stm;
  }

  public function getListImagesById($product_id)
  {
    $query = 'SELECT * FROM product_image WHERE product_id = ' . $product_id . ' and isDeleted = false;';
    $stm = $this->con->prepare($query);
    $stm->execute();
    return $stm;
  }
  public function getSingleById($id)
  {
    $query = 'SELECT T1.*, T3.price_per, T1.price - (T3.price_per / 100 * T1.price) as `discountedPrice` FROM ' . $this->table_name . " T1 LEFT JOIN discount_product T2 ON T2.product_id =T1.id LEFT JOIN discount T3 ON T3.id = T2.discount_id where T1.id = '{$id}' and T1.isDeleted = 0;";
    $stm = $this->con->prepare($query);
    //  $stm->bindParam(1, $id);
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
        $this->price_per = $row['price_per'];
        $this->discountedPrice = $row['discountedPrice'];

        // if (!empty($row['price_per'])) {
        //   $this->price_per = $row['price_per'];
        //   $this->discountedPrice = strval($this->price / 100 * $row['price_per']);
        // }

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
      return $this->con->lastInsertId();
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

  public function searchByKey($key, $sort = "asc")
  {
    $query = 'SELECT T1.*, T3.price_per, T1.price - (T3.price_per / 100 * T1.price) as `discountedPrice` FROM ' . $this->table_name . " T1 LEFT JOIN discount_product T2 ON T2.product_id =T1.id LEFT JOIN discount T3 ON T3.id = T2.discount_id WHERE T1.slug LIKE '%$key%' ORDER BY T1.price $sort;";
    $stm = $this->con->prepare($query);
    $stm->execute();
    return $stm;
  }
  public function searchByCategory($cate, $sort = "asc")
  {
    $query = 'SELECT T1.*, T3.price_per, T1.price - (T3.price_per / 100 * T1.price) as `discountedPrice` FROM ' . $this->table_name . " T1 LEFT JOIN discount_product T2 ON T2.product_id =T1.id LEFT JOIN discount T3 ON T3.id = T2.discount_id WHERE category_id='$cate' ORDER BY T1.price $sort;";
    $stm = $this->con->prepare($query);
    $stm->execute();
    return $stm;
  }

  public function searchByKeyAndCate($key, $cate, $sort = "asc")
  {
    $query = 'SELECT T1.*, T3.price_per, T1.price - (T3.price_per / 100 * T1.price) as `discountedPrice` FROM ' . $this->table_name . " T1  LEFT JOIN discount_product T2 ON T2.product_id =T1.id LEFT JOIN discount T3 ON T3.id = T2.discount_id WHERE T1.slug LIKE '%$key%' and category_id='$cate' ORDER BY T1.price $sort;";
    $stm = $this->con->prepare($query);
    $stm->execute();
    return $stm;
  }
  public function delete_subimage($name)
  {
    $query = "UPDATE `product_image` SET isDeleted = true WHERE `image_name` = '$name';";
    $stm = $this->con->prepare($query);
    $stm->execute();
    return $stm;
  }
  public function create_subimage($id, $name)
  {
    $query = "INSERT INTO `product_image`(`product_id`,`image_name`) VALUES ('$id', '$name');";
    $stm = $this->con->prepare($query);
    $stm->execute();
    return $stm;
  }
  public function create_discount($discount_id)
  {
    $query1 = "SELECT * FROM discount_product WHERE product_id = '$this->id';";
    $stm = $this->con->prepare($query1);
    if ($stm->execute() && $stm->rowCount() > 0) {
      $query3 = "UPDATE discount_product SET `discount_id`= '$discount_id' WHERE product_id = '$this->id';";
      $stm3 = $this->con->prepare($query3);
      $stm3->execute();
      return $stm3;
    } else {
      $query2 = "INSERT INTO discount_product(`discount_id`, `product_id`) VALUES ('$discount_id', '$this->id');";
      $stm2 = $this->con->prepare($query2);
      $stm2->execute();
      return $stm2;
    }
    // return $stm;
  }
}
