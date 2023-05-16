<?php if (empty($_SESSION['account'])) header("Location: ./login_register.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Add User Information</title>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

    <?php require_once "./inc/header.php"; ?>

    <!-- Main CSS-->
    <!-- <link rel="stylesheet" href="./css/login_register.css" /> -->
    <style>
        <?php include "./css/login_register.css"; ?>
    </style>
</head>

<body>
    <div class="container active info">
        <div class="forms">
            <!-- Information Form -->
            <div class="form signup">
                <span class="title">Information</span>
                <form action="" method="post" id="form-info">
                    <input id="account_id" type="hidden" value="<?php if (isset($_SESSION['account'])) {
                                                            echo $_SESSION['account']['id'];
                                                        }  ?>" />

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
                    <div class="flex-box" style="margin-bottom: 30px;">
                        <div class="input-field">
                            <input id="phone" type="text" placeholder="Phone" required />
                            <i class="uil uil-phone icon"></i>
                        </div>
                        <div class="input-field">
                            <input id="birth_date" type="date" required />
                            <i class="uil uil-calender icon"></i>
                        </div>
                    </div>
                    <div class="gender">
                        <label for="" style="margin-right: 20px;">Gender: </label>
                        <input type="radio" name="gender" id="male" value="nam" required>
                        <label for="male">Male</label>
                        <input type="radio" name="gender" id="female" value="nu" style="margin-left: 30px;" required>
                        <label for="female">Female</label>

                    </div>
                    <div class="input-field">
                        <select class="form-select" id="city">
                            <option value="" default>------ Thành Phố, Tỉnh -------</option>
                        </select>

                    </div>
                    <div class="input-field">
                        <select class="form-select" id="provinces">
                            <option value="">------ Quận, Huyện -------</option>
                        </select>
                    </div>


                    <div class="input-field">
                        <select class="form-select" id="ward">
                            <option value="">------ Xã, Thôn -------</option>
                        </select>

                    </div>


                    <div class="input-field">
                        <input id="address" type="text" placeholder="Address" required />
                        <i class="uil uil-location-point icon"></i>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Update" />
                    </div>
                </form>
                <div class="error"></div>
            </div>
        </div>
    </div>

</body>
<script src="./javascript/info_account.js"></script>


</html>
<!-- end document-->