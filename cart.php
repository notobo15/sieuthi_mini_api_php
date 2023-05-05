<?php require_once "./loading.php"; ?>

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
  <!-- <link rel="stylesheet" href="./css/modal-card.css"> -->
  <link rel="stylesheet" href="./css/modal-info-product.css">
  <link rel="stylesheet" href="./css/footer.css">
  <link rel="stylesheet" href="./css/modal_oder.css">
  <link rel="stylesheet" href="./css/infoProduct.css">
  <link rel="stylesheet" href="./css/card.css">
  <link rel="stylesheet" href="./css/slider.css">
  <?php require_once "./inc/header.php"; ?>
  <title>Giỏ Hàng</title>
</head>

<body>

  <div class="main">
    <!-- oppen header -->
    <?php require_once "./inc/home_header.php" ?>
    <!-- end header -->
    <!-- ----------------------------------------------------------Modal thông tin giỏ hàng----------------------------------------------------------------------- -->
    <!-- <div class="modal_card">
          <div class="modal_overlay_card">
          </div>
            <div class="modal_body_card">
              <div class="modal_body_card_header">
                <h2 class="text-center py-4">THÔNG TIN GIỎ HÀNG</h2>
                <span class="icon-close-card"><i class="fa-solid fa-x"></i></span>
                 <a href="#" class="icon-close-card"><i class="fa-solid fa-x"></i></a>
              </div>
              <div class="container moda-card-info"> 
               <table id="cart" class="table table-hover table-condensed"> 
                <thead > 
                 <tr> 
                  <th style="width:40%" class="bg-danger">Tên sản phẩm</th> 
                  <th style="width:13%" class="bg-danger">Giá</th> 
                  <th style="width:20%" class="bg-danger">Số lượng</th> 
                  <th style="width:14%" class="text-center bg-danger">Thành tiền</th> 
                  <th style="width:12%" class="bg-danger"> </th> 
                 </tr> 
                </thead> 
                <tbody class="add-card-product" id="card-product-info">
                  <tr> 
                 <td data-th="Sản Phẩm" class="my-3"> 
                  <div class="row"> 
                   <div class="col-sm-4 hidden-md"><img src="img/product/mi-kho-ga-cay-samyang-goi-140g-202302271042338764.png" alt="Sản phẩm 1" class="img-responsive" width="100">
                   </div> 
                   <div class="col-sm-8 fs-6"> 
                    <h4 class="nomargin fs-6">Mì gà siêu cay</h4> 
                    <p>Nhập khẩu trực tiếp từ Korea</p> 
                   </div> 
                  </div> 
                 </td> 
                 <td data-th="Giá">200.000 đ</td> 
                 <td data-th="Số lượng">
                  <div class="number_card">
                    <span class="minus_card"><i class="fa-solid fa-minus"></i></span>
                    <input type="text" value="1" min="1"/>
                    <span class="plus_card"><i class="fa-solid fa-plus"></i></span>
                  </div>
                 </td> 
                 <td data-th="Tổng tiền" class="text-center">200.000 đ</td> 
                 <td class="actions" data-th="">
                  <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                  </button> 
                  <button class="btn btn-danger btn-sm text-black"><i class="fa-solid fa-trash"></i>
                  </button>
                 </td> 
                </tr> 
                </tbody>
               </table>
              </div>
              <div class="footer-modal-card py-3">
                <div class="row">
                  <div class=" col-lg-4 col-md-4 col-sm-12">
                    <div class="btn-home" style="display: flex; justify-content: center; align-items: center; width: 210px;">
                      <a href="" class="btn btn-warning text-white mx-3" style="width: 200px;">
                        <i class="fa fa-angle-left "></i>
                        Tiếp tục mua hàng
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 " style="display: flex; justify-content: center; align-items: center;" >
                    <div class="btn-sum-price"style="display: flex; justify-content: center; align-items: center; width: 240px;">
                      <p style="width: 235px;">Tổng tiền Hàng : <strong>2.000.000 </strong>đ</p>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12  ">
                      <div class="btn-pay"style="display: flex; justify-content: center; align-items: center;">
                        <a href="" class="btn btn-danger btn-block" style="width: 200px;">Thanh toán <i class="fa fa-angle-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
               </div>
            </div> -->
    <!-- ----------------------------------------------------------Modal tình trạng đơn hàng----------------------------------------------------------------------- -->
    <div class="modal_oder">
      <div class="modal_overlay_oder">
      </div>
      <div class="modal_body_oder">
        <div class="modal_body_oder_header">
          <h2 class=" py-4">THÔNG TIN ĐƠN HÀNG</h2>
          <a href="#" class="icon-close-oder"><i class="fa-solid fa-x"></i></a>
        </div>
        <div class="container moda-card-info">
          <table id="cart" class="table table-hover table-condensed">
            <thead>
              <tr>
                <th style="width:18%" class="bg-white">Mã đơn hàng</th>
                <th style="width:15%" class="bg-white">Thời gian</th>
                <th style="width:20%" class="bg-white">Email người nhân</th>
                <th style="width:10%" class="bg-white">Tổng tiền</th>
                <th style="width:22%" class="bg-white">Tình trạng đơn hàng</th>
                <th style="width:15%" class="bg-white"> Chỉnh sửa </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td data-th="Mã đơn hàng :" class="my-3">
                  <strong class="text-danger MDH">S0000020</strong>
                </td>
                <td data-th="Thời gian :">10:34 20/02/2023</td>
                <td data-th="Email :">
                  <ins class="text-danger :">skt@gmai.com</ins>
                </td>
                <td data-th="Tổng tiền :">200.000 đ</td>
                <td data-th="Tình trạng :">
                  Chưa thanh toán
                </td>
                <td class="actions-2" data-th="">
                  <button class="btn btn-danger btn-sm text-black"><i class="fa-solid fa-trash"></i> Hủy đơn hàng
                  </button>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <!----------------------------------------------------------Nội dung chính trang web----------------------------------------------------------------------------------->
    <div class="container content-container">
      <div class="col-md-12">
        <section class="myCard mb-2 bg-white">

          <div class="card-header">
            <h2>THÔNG TIN GIỎ HÀNG</h2>
            <!-- <a href="#" class="icon-close-card"><i class="fa-solid fa-x"></i></a> -->
            <?php if (empty($_SESSION['cart'])) :  ?>
              <div class="row">
                <img src="./images/car-empty.png" alt="" class="mx-auto mx-1 d-block col-4 col-lg-3">
              </div>
            <?php else : ?>

          </div>
          <div class="container card-info">
            <table id="cart" class="table table-hover table-condensed">
              <thead>
                <tr>
                  <th style="width:40%">Tên sản phẩm</th>
                  <th style="width:13%">Giá</th>
                  <th style="width:20%">Số lượng</th>
                  <th style="width:14%">Thành tiền</th>
                  <th style="width:12%"> </th>
                </tr>
              </thead>
              <tbody class="add-card-product" id="card-product-info">

              </tbody>
            </table>
          </div>
          <div class="footer-card py-3">
            <div class="row">
              <div class=" col-lg-4 col-md-4 col-sm-12">
                <div class="btn-home" style="display: flex; justify-content: center; align-items: center; width: 100%;">
                  <a href="index.php" class="btn btn-warning text-white mx-3" style="width: 200px;">
                    Tiếp tục mua hàng
                  </a>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12 " style="display: flex; justify-content: center; align-items: center;">
                <div class="btn-sum-price" style="display: flex; justify-content: center; align-items: center; width: 100%;">
                  <p style="width: 235px;">Tạm tính : <strong class="total-price-cart">0</strong></p>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12  ">
                <div class="btn-pay" style="display: flex; justify-content: center; align-items: center; width: 100%;">
                  <span class="btn btn-danger btn-block" style="width: 200px;" onclick="return createOrder()"> Đặt Hàng </span>
                </div>
              </div>
            </div>
          </div>
          <button class="btn btn-success mt-2" id="clear_card" style="width: 100%;" onclick="return clearAll()"> Xóa tất cả </button>
        <?php endif; ?>
        </section>
        <?php require_once "./inc/modal_alert.php"; ?>
        <?php require_once "./inc/home_footer.php"; ?>
      </div>
    </div>
  </div>
  </div>
  </div>
</body>
<!-- <script src="./javascript/card.js"></script> -->
<script src="./javascript/GrounpFeature.js"></script>
<script src="./javascript/product.js"></script>
<script src="./javascript/modal_info_product.js"></script>
<!-- <script src="./javascript/menu.js"></script> -->
<script src="./javascript/modal_card.js"></script>
<!-- <script src="./javascript/modal_oder.js"></script> -->

</html>