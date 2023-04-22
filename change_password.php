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
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script> -->

    <title>Change Password</title>
</head>

<body>
    <div class="container">
        <div class="forms">
            <div class="form">
                <span class="title">Change Password</span>
                <form action="" method="post">
                    <div class="input-field">
                        <input id="password" type="password" class="password current-pass-field" name="password" placeholder="Enter your current password" required />
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw cur-pass"></i>
                    </div>
                    <div class="input-field">
                        <input id="password" type="password" class="password new-pass-field" name="password" placeholder="Enter your new password" required />
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw new-pass"></i>
                    </div>
                    <div class="input-field">
                        <input id="password" type="password" class="password confirm-pass-field" name="password" placeholder="Confirm your new password" required />
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw conf-pass"></i>
                    </div>
                    <div class="input-field button">
                        <input type="submit" value="Change Password" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="./javascript/change_password.js"></script>
</body>