<?php require_once "loading.php" ?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/header.css">
  <link rel="stylesheet" href="./css/index.css">
  <link rel="stylesheet" href="./css/product.css">
  <link rel="stylesheet" href="./css/groupcate.css">
  <link rel="stylesheet" href="./css/menu.css">
  <link rel="stylesheet" href="./css/grounpfeature.css">
  <link rel="stylesheet" href="./css/modal-card.css">
  <link rel="stylesheet" href="./css/modal-info-product.css">
  <link rel="stylesheet" href="./css/footer.css">
  <link rel="stylesheet" href="./css/modal_oder.css">
  <link rel="stylesheet" href="./css/slider.css">
  <link rel="icon" type="image/x-icon" href="./img/images-removebg-preview.png">
  <title>Siêu thị mini</title>
  <?php include_once "./inc/header.php"; ?>

</head>

<body>

  <div class="main">
    <?php include_once "./inc/home_header.php"; ?>
    <!-- ----------------------------------------------------------Modal thông tin giỏ hàng----------------------------------------------------------------------- -->
    <?php #include "./inc/cart.php"; 
    ?>
    <?php #include "./inc/order.php"; 
    ?>
    <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <!----------------------------------------------------------Nội dung chính trang web----------------------------------------------------------------------------------->
    <div class="container content-container">
      <div class="row">
        <?php include_once "./inc/home_navbar.php"; ?>
        <div class="col-md-9">

          <?php include_once "./inc/home_slider.php"; ?>
          <!-- oppen grounpcate -->
          <?php include_once "./inc/home_group_category.php"; ?>

          <!-- end Groupcate -->
          <!-- <section class="myProduct">
            <div class=" container-product">
              <div class="pt-2 title-product ">
                <h2 class="fs-5 mb-3">CÁC SẢN PHẨM KHUYẾN MÃI</h2>
              </div>
              <div class="row pb-2 px-3 product-list">
              </div>
            </div>
            <div class="container see-more-container">
              <div class="see-more-product">
                <a href="#"> Xem thêm sản phẩm...</a>
              </div>
            </div>
          </section> -->
          <section class="myGrounpFeature1">
          </section>

          <!-- end groupfeature -->
          <!-- oppen groupfeature Mì ăn liền -->
          <section class="myGrounpFeature">
          </section>
          <!-- end groupfeature mì ăn liền -->
          <?php include_once "./inc/home_footer.php"; ?>
        </div>
      </div>
    </div>
  </div>
</body>

<!-- <script src="./javascript/product.js"></script> -->
<!-- <script src="./javascript/test_javascript.js"></script> -->
<!-- <script src="./javascript/modal_info_product.js"></script> -->
<!-- <script src="./javascript/GrounpFeature.js"></script> -->
<script src="./javascript/menu.js"></script>
<script src="./javascript/modal_card.js"></script>
<script src="./javascript/modal_oder.js"></script>
<script src="./javascript/homepage.js"></script>


</html>