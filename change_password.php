<?php if (empty($_SESSION['account'])) header("Location: ./login_register.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!-- <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.css" /> -->
    <link rel="stylesheet" href="./css/change_password.css" />
    <!-- <link rel="stylesheet" href="./lib/bootstrap/js/bootstrap.bundle.js" /> -->
    <!-- <script src="./lib/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <!-- ===== CSS ===== -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <title>Thay Đổi Mật Khẩu</title>
</head>

<body>
    <div class="container">
        <div class="forms">
            <div class="form">
                <span class="title">Thay Đổi Mật Khẩu</span>
                <form action="" method="post" id="form-change-password">
                    <div class="input-field">
                        <input id="password_current" type="password" class="password current-pass-field" name="password_current" placeholder="Nhập Mật Khẩu Hiện Tại" required />
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw cur-pass"></i>
                    </div>
                    <div class="input-field">
                        <input id="password1" type="password" class="password new-pass-field" name="password1" placeholder="Nhập Mật Khẩu Mới" required />
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw new-pass"></i>
                    </div>
                    <div class="input-field">
                        <input id="password2" type="password" class="password confirm-pass-field" name="password2" placeholder="Nhập Lại Mật Khẩu Mới" required />
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw conf-pass"></i>
                    </div>
                    <div id="err_register" class="error"></div>
                    <div class="input-field button">
                        <input type="submit" value="Đồng Ý" />
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="./javascript/change_password.js"></script>
</body>