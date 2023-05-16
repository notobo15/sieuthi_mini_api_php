<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- ===== Iconscout CSS ===== -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <script src="./lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./lib/bootstrap/js/bootstrap.bundle.js" />
  <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="./css/login_register.css" />
  <!-- ===== CSS ===== -->

  <title>Đăng Nhập</title>
</head>

<body>
  <div class="container">
    <div class="forms">
      <div class="form login">
        <span class="title">Đăng Nhập</span>
        <form action="" method="post" id="form-login">
          <div class="input-field">
            <input id="username" name="name" type="text" placeholder="Enter your username" required />
            <i class="uil uil-user"></i>

          </div>
          <div class="input-field">
            <input id="password" type="password" class="password" name="password" placeholder="Enter your password" required />
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
          </div>
          <div class="input-field button">
            <input type="submit" value="Login" />
          </div>
        </form>

        <div class="login-signup">
          <span class="text">Nếu Bạn Chưa Có Tài Khoản
            <a href="#" class="text signup-link">Đăng Ký Ngay</a>
          </span>
        </div>

        <div id="err_login" class="error"></div>
      </div>

      <!-- Registration Form -->
      <div class="form signup">
        <span class="title">Đăng Ký</span>
        <form action="" method="post" id="form-signup">
          <div class="flex-box">
            <div class="input-field">
              <input id="first_name" type="text" placeholder="First name" required />
              <i class="uil uil-user-square"></i>
            </div>
            <div class="input-field">
              <input id="last_name" type="text" placeholder="Last name" required />
              <i class="uil uil-user-square"></i>
            </div>
          </div>
          <div class="flex-box">
            <div class="input-field">
              <input id="username_rg" type="text" placeholder="Username" required />
              <i class="uil uil-user"></i>
            </div>
            <div class="input-field">
              <input id="phone" type="text" placeholder="Phone" required />
              <i class="uil uil-phone icon"></i>
            </div>
          </div>
          <div class="input-field">
            <input id="password_rg" type="password" class="password" placeholder="Create a password" required />
            <i class="uil uil-lock icon"></i>
            <!-- <i class="uil uil-eye-slash showHidePw"></i> -->

          </div>
          <div class="input-field">
            <input id="password_rg_confirm" type="password" class="password" placeholder="Confirm a password" required />
            <i class="uil uil-lock icon"></i>
            <!-- <i class="uil uil-eye-slash showHidePw"></i> -->
          </div>
          <div class="input-field button">
            <input type="submit" value="Đăng Ký" />
          </div>
        </form>

        <div class="login-signup">
          <span class="text">Bạn Đã Có Tài Khoản?
            <a href="#" class="text login-link">Đăng Nhập Ngay</a>
          </span>
        </div>
        <div id="err_register" class="error"></div>
      </div>
    </div>
  </div>
  <!-- modal -->
  <div style="top: 10%" class="modal-alert alert alert-success d-none position-absolute" role="alert">
    <!-- <button
        type="button"
        class="close"
        data-dismiss="alert"
        aria-label="Close"
      >
        <span aria-hidden="true">&times;</span>
      </button> -->
    <strong>Bạn đã đăng nhập thành công!</strong>
  </div>

  <script src="./javascript/login_register.js"></script>
  
</body>

</html>