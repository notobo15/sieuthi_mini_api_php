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
  <?php require_once "loading.php" ?>
</head>

<body>

  <div class="main">
    <?php include_once "./inc/home_header.php"; ?>
    <!-- ----------------------------------------------------------Modal thông tin giỏ hàng----------------------------------------------------------------------- -->
    <?php include "./inc/cart.php"; ?>

    <!-- ----------------------------------------------------------Modal tình trạng đơn hàng----------------------------------------------------------------------- -->
    <?php include "./inc/order.php"; ?>

    <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <!----------------------------------------------------------Nội dung chính trang web----------------------------------------------------------------------------------->
    <div class="container content-container">
      <div class="row">
        <?php include_once "./inc/home_navbar.php"; ?>
        <div class="col-md-9">

          <section class="myGrounpFeature1">
            <!-- select-API -->
            <div class="container-grounpfreature">
              <div class="title-grounpfeature border-bottom mx-3 pt-1">
                <span class="fs-6 text-black heading-search"></span>

              </div>
              <div class="row pb-2 px-3 content-search-result">
              </div>
            </div>
            <div class=" see-more-container py-2 my-2" style="height: fit-content;">
              <ul class="pagination justify-content-center mb-0">
                <!-- <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                  </li> -->
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                  <a class="page-link" href="#">2</a>
                </li>
                <!-- <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li> -->
              </ul>
            </div>
          </section>

          <?php include_once "./inc/home_footer.php"; ?>
        </div>
      </div>
    </div>
  </div>
</body>
<script>

</script>

<!-- <script src="./javascript/product.js"></script> -->
<!-- <script src="./javascript/test_javascript.js"></script> -->
<!-- <script src="./javascript/modal_info_product.js"></script> -->
<!-- <script src="./javascript/GrounpFeature.js"></script> -->
<script src="./javascript/menu.js"></script>
<!-- <script src="./javascript/modal_card.js"></script> -->
<!-- <script src="./javascript/modal_oder.js"></script> -->
<script src="./javascript/search.js"></script>
<!-- <script src="./javascript/api.js"></script> -->
<?php #include_once "./inc/hideLoading.php"; 
?>

</html>