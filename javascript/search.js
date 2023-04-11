$(document).ready(function () {
  let key = new URL(location.href).searchParams.get("key") || "";
  let cate = new URL(location.href).searchParams.get("cate") || "";
  let page = new URL(location.href).searchParams.get("page") || "";
  $.ajax({
    type: "get",
    url: `api/product/search.php?key=${key}&cate=${cate}&page=${page}`,
    success: function (data) {
      console.log(data);
      let products = data.products;
      let htmls = "";
      $(".heading-search").html(
        `Kết quả tìm kiếm '<strong>${key}</strong>' cho: ${products.length} kết quả`
      );

      if (cate && key == "") {
        let title = `<a href="index.php" style="font-size: 14px;">Trang chủ</a><span> &gt; </span><span style="font-size: 14px;">${data.category_name}</span>`;
        $(".heading-search").html(title);
      }
      if (products.length !== "") {
        // $(".total-product-result").text(data.length);
      }
      products.forEach((item) => {
        htmls += `
        <div class="col-md-3 col-sInfoproduct_pricem-6 col-6 p-0 ">
          <div class="product-box">
            <div class="product-inner-box position-relative">
              <div class="icons position-absolute">
                <a href="./product.php?id=${item.id}" class="text-decoration-none"><i class="fa-solid fa-eye"></i></a>
              </div>
              <div class="onsale_2 position-absolute top-0 start-0">
                <span class="badge_2 rounded-0">
                  <!-- <i class="fa-solid fa-arrow-down"></i> -->
                  Mới
                </span>
              </div>
              <div class="product-img">
                <img src="./images/products/${item.img}" alt="woodan chair" class="img-fluid">
              </div>
              <div class="cart-btn">
                <button class="btn btn-white bg-white shadow-sm rounded-pill" data="undefined"
                  data1="Thùng 30 gói mì Hảo Hảo tôm chua cay 75g" data2="1"><i class="fa-solid fa-cart-plus"></i>Mua
                  Ngay</button>
              </div>
            </div>
            <div class="product-info">
              <div class="product-name">
                <h3>${item.name}</h3>
              </div>
              <div class="product-price">
                <span>${item.price}</span>
              </div>
            </div>
          </div>
        </div>
        `;
      });
      $(".content-search-result").html(htmls);
      let prevPage = +page - 1;
      let nextPage = +page + 1;
      let prev = `search.php?${key}&cate=${cate}&page=${prevPage}`;
      let next = `search.php?${key}&cate=${cate}&page=${nextPage}`;
      let btn_pagination = `<li class="page-item ${
        prevPage <= 0 ? "disabled" : ""
      }">
                    <a class="page-link" href="${prev}" tabindex="-1" aria-disabled="true"><i class="fa-solid fa-chevron-left"></i></a>
                  </li>`;
      console.log(data.totalPage);
      for (let index = 1; index <= data.totalPage; index++) {
        btn_pagination += `<li class="page-item ${
          index == page ? "active" : ""
        }"><a class="page-link" href="search.php?key=${key}&cate=${cate}&page=${index}">${index}</a></li>`;
      }
      btn_pagination += `<li class="page-item ${
        nextPage > data.totalPage ? "disabled" : ""
      }">
      <a class="page-link" href="${next}"><i class="fa-solid fa-chevron-right"></i></a>
    </li>`;
      $(".pagination").html(btn_pagination);
    },
  }); 
  hideLoading();
});
