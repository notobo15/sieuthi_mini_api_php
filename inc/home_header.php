<!-- oppen header -->
<section class="myHeader " style="background-color:#f6f6f6 ;">
  <div class="">
    <div class="intro-repost">
      <h3 class="fs-6 text-center pt-2">Siêu khuyễn mãi từ<strong> 3/6/2023</strong> đến <strong>4/4/2023</strong> <strong style="color: red;">Mua Ngay !</strong>

      </h3>
      <div class="repos">
        <div class="repos-header">
          <div class="logorepos">
            <svg width="30px" height="30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-ripple" style="background: none;">
              <circle cx="50" cy="50" r="34.4107" fill="none" ng-attr-stroke="{{config.c1}}" ng-attr-stroke-width="{{config.width}}" stroke="rgb(255,0,0)" stroke-width="20" class="">
                <animate attributeName="r" calcMode="spline" values="0;40" keyTimes="0;1" dur="1.5" keySplines="0 0.2 0.8 1" begin="-0.75s" repeatCount="indefinite" class="">

                </animate>
                <animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="1.5" keySplines="0.2 0 0.8 1" begin="-0.75s" repeatCount="indefinite" class="">

                </animate>
              </circle>
              <circle cx="50" cy="50" r="15.3017" fill="none" ng-attr-stroke="{{config.c2}}" ng-attr-stroke-width="{{config.width}}" stroke="rgb(255,0,0)" stroke-width="20" class="">
                <animate attributeName="r" calcMode="spline" values="0;40" keyTimes="0;1" dur="1.5" keySplines="0 0.2 0.8 1" begin="0s" repeatCount="indefinite" class="">
                </animate>
                <animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="1.5" keySplines="0.2 0 0.8 1" begin="0s" repeatCount="indefinite" class="">
                </animate>
              </circle>
            </svg>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-2 col-sm-3 col-3 py-2 img-header ">
            <a href="./index.php">
              <img src="./img/images-removebg-preview.png" style="object-fit: cover;" alt="" class="img-fluid">

            </a>
          </div>
          <div class="col-md-5 col-sm-9 col-9 py-3 my-auto">
            <form action="search.php" id="form-search">
              <div class="input-group mt-1 input-myheader">

                <input type="hidden" class="form-control input-search" name="page" value="1">
                <!-- <input type="hidden" class="" name="page" value="1"> -->
                <input required type="text" class="form-control input-search" name="key" placeholder=" Từ khóa tìm kiếm ?" style="box-shadow: none; border: 1px solid #e7e7e7; border-right: none;">
                <button type="submit" class="input-group-text bg-danger" id="btn_search" style="border: 1px solid #e7e7e7;"><i class="fa-solid fa-magnifying-glass text-light"></i></button type="submit">
              </div>
            </form>
          </div>
          <div class="col-md-3 col-sm-6 col-6 py-3 d-flex align-items-center">

            <div class="container-address-header p-1 gap-1">
              <div class=" text-center address-header bg-danger mr-1">
                <span class="text-white fs-3"><i class="fa-solid fa-location-dot"></i></span>
                <span style="font-size: 14px; margin-left: 10px;" class="text-white">Nhập địa chỉ <br />của bạn</span>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-sm-6 col-6 py-3 d-flex align-items-center">
            <div class="row">
              <div class="col-4">
                <a type="button" href="order.php" class=" icon-oder position-relative">
                  <span class="fs-3 text-danger"><i class="fa-solid fa-truck-fast"></i></span>
                  <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"> -->
                  <!-- 0 -->
                  <!-- <span class="visually-hidden">unread messages</span> -->
                  </span>
                </a>
              </div>
              <div class="col-4">
                <a type="button" href="cart.php" class=" icon-card position-relative">
                  <span class="fs-3 text-danger" data-bs-toggle="modal" data-bs-target="#modal-card"><i class="fa-solid fa-cart-shopping"></i></span>
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger order_number">
                    <?php if (isset($_SESSION['cart'])) echo count($_SESSION['cart']);
                    else echo 0; ?>
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </a>
              </div>
              <div class="col-4">
                <!-- <a href="login_register.php" style="text-decoration: none;" class="text-danger"><i class="fa-solid fa-user icon-user fs-3"></i></a> -->
                <div class="btn-group">
                  <span class="text-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user-large icon-user fs-3"></i>
                  </span>
                  <ul class="dropdown-menu">
                    <?php if (empty($_SESSION['account'])) : ?>
                      <li><a class="dropdown-item bg-danger text-white" href="login_register.php">Đăng Nhập</a></li>
                    <?php endif;
                    // print_r($_SESSION['account']);
                    if (isset($_SESSION['account'])) :
                    ?>
                      <?php if (isset($_SESSION['account']['group_id']) == 5) : ?>
                        <li> <a class="dropdown-item bg-white" href="admin/index.php">Đi Dến Admin</a></li>
                      <?php endif; ?>
                      <li> <a class="dropdown-item bg-white" href="change_password.php">Thay Đổi Mật Khẩu</a></li>
                      <li> <a class="dropdown-item bg-white" href="info.php">Thông Tin Của Bạn</a></li>
                      <li> <a class="dropdown-item bg-white" href="./api/accounts/logout.php">Đăng Xuất</a></li>
                    <?php endif ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end header -->