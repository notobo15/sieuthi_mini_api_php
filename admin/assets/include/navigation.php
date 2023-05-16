<div class="navigation">
    <ul>
        <li>
            <a href="." class="">
                <p class="icon">
                    <img src="../img/images-removebg-preview.png" alt="" width="100%" srcset="">
                </p>
                <h6 class="title mt-2">Siêu Thị Mini</h6>
            </a>
        </li>
        <li>
            <a href=".">
                <span class="icon">
                    <ion-icon name="person-circle-outline"></ion-icon>
                </span>
                <span class="title"><?php if (!empty($_SESSION['account']))   $fullname  = $_SESSION['account']['last_name'] . " " . $_SESSION['account']['first_name'];
                                    echo ($fullname);  ?></span>
            </a>
        </li>
        <?php if (($_SESSION['account']['group_id']) ==  1 || ($_SESSION['account']['group_id']) ==  2) : ?>

            <li>
                <a href="#dashboard_container">
                    <span class="icon">
                        <ion-icon name="bar-chart-outline"></ion-icon>
                    </span>
                    <span class="title">Trang Chủ</span>
                </a>
            </li>

        <?php endif; ?>
        <li>
            <a href="#user_container">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Accounts</span>
            </a>
        </li>

        <li>
            <a href="#product_container">
                <span class="icon">
                    <ion-icon name="cube-outline"></ion-icon>
                </span>
                <span class="title">Products</span>
            </a>
        </li>

        <li>
            <a href="#order_container">
                <span class="icon">
                    <ion-icon name="albums-outline"></ion-icon>
                </span>
                <span class="title">Orders</span>
            </a>
        </li>
        <li>
            <a href="#category_container">
                <span class="icon">
                    <ion-icon name="layers-outline"></ion-icon>
                </span>
                <span class="title">Category</span>
            </a>
        </li>
        <?php if (($_SESSION['account']['group_id']) ==  1 || ($_SESSION['account']['group_id']) ==  2) : ?>

            <li>
                <a href="#discount_container">
                    <span class="icon">
                        <ion-icon name="card-outline"></ion-icon>
                    </span>
                    <span class="title">Discount</span>
                </a>
            </li>
            <li>
                <a href="#suppilier_container">
                    <span class="icon">
                        <ion-icon name="business-outline"></ion-icon>
                    </span>
                    <span class="title">Suppilier</span>
                </a>
            </li>
        <?php endif; ?>

        <!-- <li>
            <a href="#permission_container">
                <span class="icon">
                    <ion-icon name="finger-print-outline"></ion-icon>
                </span>
                <span class="title">Permission</span>
            </a>
        </li> -->


        <li onclick="return logout()">
            <a href="#">
                <span class="icon">
                    <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span class="title">Log out</span>
            </a>
        </li>
        <script>
            function logout() {
                if (confirm("Bạn Chắc Chắn Muốn Đăng Xuất?")) {
                    location.assign("../index.php")
                }
            }
        </script>
    </ul>
</div>