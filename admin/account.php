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
  <link rel="stylesheet" href="assets/css/user.css">
  <link rel="stylesheet" href="assets/css/product.css">
  <link rel="stylesheet" href="assets/css/user_profile.css">
  <link rel="stylesheet" href="assets/css/product_profile.css">

</head>

<body>
  <!-- =============== Navigation ================ -->
  <div class="container">
    <?php require_once "./inc/navbar.php"; ?>

    <!-- ========================= Main ==================== -->
    <div class="main">
      <div class="topbar">
        <div class="toggle">
          <ion-icon name="menu-outline"></ion-icon>
        </div>

        <div class="search">
          <label>
            <input type="text" placeholder="Search here">
            <ion-icon name="search-outline"></ion-icon>
          </label>
        </div>
        <div class="his">
          <ion-icon name="alert-circle-outline"></ion-icon>
        </div>
        <div class="user">
          <img src="assets/imgs/customer01.jpg" alt="">
        </div>
      </div>

      <!-- ======================= Users ================== -->
      <div id="user_container">
        <header id="user_header">
          <h1>User - Management</h1>
          <div class="user_header_search">
            <input type="text" name="search_user" id="search_user" placeholder="Search...">
            <i class="fa-solid fa-plus user_add"></i>
          </div>
        </header>

        <div id="user_table">
          <table>
            <thead>
              <tr>
                <th>Id</th>
                <th>Account</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Birthdate</th>
                <th>Address</th>
                <th>Sex</th>

                <th>Role</th>
                <th>Status</th>
                <th>Setting</th>

              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>

        </div>
      </div>

      <!-- ================= User Information ================ -->

      <div id="user_profile"> 

        <i class="fa-solid fa-xmark user_profile_btnclose"></i>
        <div>
          ID: <input type="text" name="id" class="id" disabled placeholder="ID...">
        </div>
        <div>
          Account: <input type="text" name="account" class="account" disabled placeholder="Type your account name...">
        </div>

        <div>
          Name: <input type="text" name="name" class="name" placeholder="Type your name...">
        </div>

        <div>
          phone: <input type="text" name="phone" class="phone" placeholder="Type your phone number...">
        </div>

        <div>
          Birth date: <input type="text" name="birth_date" class="birth_date" placeholder="Type your Birthdate...">
        </div>

        <div>
          Address: <input type="text" name="address" class="address" placeholder="Your address to receive products...">
        </div>

        <div>
          Sex: <select name="sex" class="sex">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>

        <div>
          Role: <select name="role" class="role">
            <option value="admin">Admin</option>
            <option value="user">User</option>
            <option value="manager">Manager</option>

          </select>
        </div>

        <div>
          Status: <select name="status" class="status">
            <option value="online">Online</option>
            <option value="offline">Offline</ption>
            <option value="busy">Busy</option>
          </select>
        </div>

        <div>
          Date created: <i class="date_created">dsadas</i>
        </div>

        <div class="user_footer">
          <button class="add">Add</button>
          <button class="save">Save</button>
          <Button class="cancel">Cancel</Button>
        </div>
      </div>

    </div>

    <!-- =========== Scripts =========  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/user.js"></script>
    <script src="assets/js/product.js"></script>

    <!-- ====== ionicons ======= -->

</body>

</html>