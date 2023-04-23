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

      <!-- ================= Products ================ -->
      <main id="product_container">
        <section class="product_header">
          <h1>Customer's Orders</h1>
          <div class="input-group">
            <input type="search" placeholder="Search Data...">
            <img src="assets/imgs/search.png" alt="">
          </div>
          <div class="add_product_div">
            <label for="export-file" class="add_product_btn" title="Export File"></label>
            <!-- <input type="checkbox" id="export-file"> -->
            <!-- <div class="export__file-options">
                            <label>Export As &nbsp; &#10140;</label>
                            <label for="export-file" id="toPDF">PDF <img src="assets/imgs/pdf.png" alt=""></label>
                            <label for="export-file" id="toJSON">JSON <img src="assets/imgs/json.png" alt=""></label>
                            <label for="export-file" id="toCSV">CSV <img src="assets/imgs/csv.png" alt=""></label>
                            <label for="export-file" id="toEXCEL">EXCEL <img src="assets/imgs/excel.png" alt=""></label>
                        </div> -->
          </div>
        </section>
        <section class="product_table">
          <table>
            <thead>
              <tr>
                <th>Id<span class="icon-arrow">&UpArrow;</span></th>
                <th>image<span class="icon-arrow">&UpArrow;</span></th>
                <th>Name<span class="icon-arrow">&UpArrow;</span></th>
                <th>Category <span class="icon-arrow">&UpArrow;</span></th>
                <th>Trademark<span class="icon-arrow">&UpArrow;</span></th>
                <th>Price<span class="icon-arrow">&UpArrow;</span></th>
                <th>Quantity<span class="icon-arrow">&UpArrow;</span></th>
                <th>Setting<span class="icon-arrow">&UpArrow;</span></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </section>

      </main>

      <!-- 
            <div id="product_profile_popup">
                <div class="close">&times;</div>
                <div class="product_profile">
                    <img src="./assets/imgs/Alson GC.jpg" alt="">
                    <div class="product_ele">
                        <label for="product_id">Id</label>
                        <input type="text" name="product_id" id="">
                    </div>
                    <div class="product_ele">
                        <label for="product_name">Name</label>
                        <input type="text" name="product_name" id="">
                    </div>
                    <div class="product_ele">
                        <label for="product_slug">Slug:</label>
                        <input type="text" name="product_slug" id="">
                    </div>
                    <div class="product_ele">
                        <label for="product_description">Description</label>
                        <textarea name="product_description" id=""></textarea>
                    </div>
                    <div class="product_ele">
                        <label for="product_price">Price</label>
                        <input type="text" name="product_price" id="">
                    </div>
                    <div class="product_ele">
                        <label for="product_mass">Mass</label>
                        <input type="text" name="product_mass" id="">
                    </div>
                    <div class="product_ele">
                        <label for="product_ingredient">Ingerdient</label>
                        <textarea name="product_ingredient" id=""></textarea>
                    </div>
                    <div class="product_ele">
                        <label for="product_htu">HowToUse</label>
                        <input type="text" name="product_htu" id="">
                    </div>
                    <div class="product_ele">
                        <label for="product_preserve">Preserve</label>
                        <textarea name="product_preserve" id=""></textarea>
                    </div>
                    <div class="product_ele">
                        <label for="product_trademark">Trademark</label>
                        <input type="text" name="product_trademark" id="">
                    </div>
                    <div class="product_ele">
                        <label for="product_markin">Markin</label>
                        <input type="text" name="product_markin" id="">
                    </div>
                    <div class="product_ele">
                        <label for="product_cate">Category</label>
                        <select name="product_cate" id="product_cate" class="" >
                            <option value="Mì, hủ tiếu, phở gói">Mì, hủ tiếu, phở gói</option>
                            <option value="Gia Vị - Nguyên Liệu Nấu Ăn" >Gia Vị - Nguyên Liệu Nấu Ăn</option>
                            <option value="2" >Đồ hộp các loại</option>
                            <option value="Rau lá">Rau lá</option>    
                            <option value="Củ, quả">Củ, quả</option>    
                            <option value="Trái cây">Trái cây</option>
                            <option value="Thịt các loại">Thịt các loại</option>
                            <option value="Cá, hải sản">Cá, hải sản</option>
                            <option value="Bia">Bia</option>
                            <option value="Nước ngọt">Nước ngọt </option>
                            <option value="Bánh Snake">Bánh Snake</option>
                            <option value="Nước giặt">Nước giặt</option>
                            <option value="Nồi, niêu, xoong, chảo">Nồi, niêu, xoong, chảo</option>
                        </select>
                    </div>
                    <div class="product_footer">
                        <button class="add">Add</button>
                        <button class="save">Save</button>
                        <Button class="cancel">Cancel</Button>
                    </div>
                </div>  
            </div> -->
      <!-- <script>
    var a = document.querySelectorAll('#product_cate option');
   
    console.log( parseInt typeof a[2].value)
</script> -->

    </div>

    <!-- =========== Scripts =========  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/user.js"></script>
    <script src="assets/js/product.js"></script>

    <!-- ====== ionicons ======= -->

</body>

</html>