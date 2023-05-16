<?php
session_start();

if (empty($_SESSION['account'])) {
    header("Location: ../login_register.php");
} else {
    if ($_SESSION['account']['group_id'] == 5) {
        header("Location: ../404.php");
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/563866a00e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js" integrity="sha512-v3ygConQmvH0QehvQa6gSvTE2VdBZ6wkLOlmK7Mcy2mZ0ZF9saNbbk19QeaoTHdWIEiTlWmrwAL4hS8ElnGFbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/account.css">
    <link rel="stylesheet" href="assets/css/product.css">
    <link rel="stylesheet" href="assets/css/user_profile.css">
    <link rel="stylesheet" href="assets/css/form_popup.css">
    <link rel="stylesheet" href="assets/css/order.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    <link rel="stylesheet" href="assets/css/category.css">
    <link rel="stylesheet" href="assets/css/suppilier.css">
    <link rel="stylesheet" href="assets/css/discount.css">
    <link rel="stylesheet" href="assets/css/permission.css">
</head>

<body>
    <!-- =============== Container ================ -->
    <div class="container-fluid" style="padding-left: 0">
        <!-- =============== Navigation ================ -->
        <?php include 'assets/include/navigation.php' ?>


        <!-- ========================= Main ==================== -->
        <div class="main">
            <!-- ========================= topbar ==================== -->
            <?php include 'assets/include/topbar.php' ?>

            <?php if (($_SESSION['account']['group_id']) ==  1 || ($_SESSION['account']['group_id']) ==  2) : ?>


                <!-- ========================= Dashboard ==================== -->
                <?php include 'assets/include/dashboard.php'
                ?>
            <?php endif; ?>
            <!-- ======================= Account ================== -->
            <?php include 'assets/include/account.php' ?>
            <!-- ================= Product ================ -->
            <?php include 'assets/include/product.php' ?>

            <!-- ================================= Order ================================= -->
            <?php include 'assets/include/order.php' ?>

            <!-- ================================= Category ================================= -->
            <?php include 'assets/include/category.php' ?>

            <!-- ================================= Suppilier ================================= -->
            <?php include 'assets/include/suppilier.php' ?>

            <!-- ================================= Discount ================================= -->
            <?php include 'assets/include/discount.php' ?>

            <!-- ================================= Permission ================================= -->
            <?php include 'assets/include/permission.php' ?>
            <?php
            // include 'assets/include/footer.php' 
            ?>
        </div>
    </div>

</body>

<!-- =========== Scripts =========  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/account.js"></script>
<script src="assets/js/product.js"></script>
<script src="assets/js/order.js"></script>
<script src="assets/js/category.js"></script>
<script src="assets/js/suppilier.js"></script>
<script src="assets/js/discount.js"></script>
<script src="assets/js/permission.js"></script>
<!-- ====== ionicons ======= -->

</html>