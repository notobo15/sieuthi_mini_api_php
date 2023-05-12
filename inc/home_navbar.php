<div class="col-md-3">
  <!-- menu reponsive -->
  <div class="myMenu-RPS">
    <div class="menu_RPS pe-4">
      <div class="icon-menu-RPS">
        <i class="fa-solid fa-bars px-3 icon-oppen-menu"></i>
        <i class="fa-solid fa-x px-3 icon-close-menu"></i>
      </div>
      <!-- <div class="input-myMenu-RPS">
                  <input type="text" placeholder="Nhập sản phẩm tìm kiếm ?">
                  <span> <i class="fa-solid fa-magnifying-glass text-danger"></i></span>
                </div> -->
    </div>
  </div>
  <!-- oppen menu -->
  <div class="myMenu-navbar mb-2 ">
    <div class="list-group container-list-group">

    </div>
  </div>
  <script>
    $(document).ready(function() {
      $.ajax({
        type: "get",
        url: "./api/category/list.php",
        success: function(data) {
          let html = `<a href="#" class="list-group-item list-group-item-action active bg-danger" aria-current="true" style="border: none;">
        <span><i class="fa-solid fa-bars px-3"></i>DANH MỤC SẢN PHẨM</span>
      </a>`;
          data.forEach((item) => {
            html += `<a href="search.php?cate=${item.id}&page=1" class="list-group-item list-group-item-action">${item.name}</a>`;
          })
          $(".myMenu-navbar .container-list-group").html(html)
        }
      })
    })
    const clickmenu = document.querySelector(`.myMenu-navbar`);
    const oppenmenu = document.querySelector(`.icon-menu-RPS .icon-oppen-menu`);
    const closemenu = document.querySelector(`.icon-menu-RPS .icon-close-menu`);
    oppenmenu.addEventListener('click', function(e) {
            clickmenu.style.display=`block`;
            oppenmenu.style.display=`none`;
            closemenu.style.display=`block`;

    });
    closemenu.addEventListener('click', function(e) {
        clickmenu.style.display=`none`;
        oppenmenu.style.display=`block`;
        closemenu.style.display=`none`;

    })
  </script>
  <!-- end menu -->
</div>