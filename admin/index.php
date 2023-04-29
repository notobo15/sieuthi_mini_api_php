<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <script src="https://kit.fontawesome.com/563866a00e.js" crossorigin="anonymous"></script>
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
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
    <div class="container">
        <!-- =============== Navigation ================ -->
        <?php include 'assets/include/navigation.php' ?>


        <!-- ========================= Main ==================== -->
        <div class="main">
            <!-- ========================= topbar ==================== -->
            <?php include 'assets/include/topbar.php' ?>

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
        </div>
    </div>
    
</body>

<!-- =========== Scripts =========  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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