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
  <link rel="stylesheet" href="./css/infoProduct.css">
  <link rel="stylesheet" href="./css/slider.css">
  <link rel="stylesheet" href="./css/slider_img_infoproduct.css">
  <?php include_once "./inc/header.php"; ?>
  <title>Siêu thị mini</title>
</head>

<body>

  <div class="main">
    <?php include_once "./inc/home_header.php"; ?>
    <!-- ----------------------------------------------------------Modal thông tin giỏ hàng----------------------------------------------------------------------- -->
    <?php include "./inc/cart.php"; ?>
    <?php include "./inc/order.php"; ?>
    <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <!----------------------------------------------------------Nội dung chính trang web----------------------------------------------------------------------------------->
    <div class="container content-container">
      <div class="row">
        <?php include_once "./inc/home_navbar.php"; ?>
        <div class="col-md-9">
          <section class="myInfoProduct p-3 mb-2" style="background-color: #fff;">

          </section>
          <?php require_once "./inc/home_footer.php"; ?>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./javascript/info_Product_API.js"></script>
<!-- <script src="./javascript/GrounpFeature.js"></script> -->
<!-- <script src="./javascript/product.js"></script> -->
<!-- <script src="./javascript/test_javascript.js"></script> -->
<script src="./javascript/modal_info_product.js"></script>
<script src="./javascript/menu.js"></script>
<!-- <script src="./javascript/modal_card.js"></script> -->
<!-- <script src="./javascript/modal_oder.js"></script> -->

</html>