function toNonAccentVietnamese(str) {
  str = str.toLowerCase();
  str = str.replace(/A|Á|À|Ã|Ạ|Â|Ấ|Ầ|Ẫ|Ậ|Ă|Ắ|Ằ|Ẵ|Ặ/g, "A");
  str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
  str = str.replace(/E|É|È|Ẽ|Ẹ|Ê|Ế|Ề|Ễ|Ệ/, "E");
  str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
  str = str.replace(/I|Í|Ì|Ĩ|Ị/g, "I");
  str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
  str = str.replace(/O|Ó|Ò|Õ|Ọ|Ô|Ố|Ồ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ỡ|Ợ/g, "O");
  str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
  str = str.replace(/U|Ú|Ù|Ũ|Ụ|Ư|Ứ|Ừ|Ữ|Ự/g, "U");
  str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
  str = str.replace(/Y|Ý|Ỳ|Ỹ|Ỵ/g, "Y");
  str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
  str = str.replace(/Đ/g, "D");
  str = str.replace(/đ/g, "d");
  // Some system encode vietnamese combining accent as individual utf-8 characters
  str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ""); // Huyền sắc hỏi ngã nặng
  str = str.replace(/\u02C6|\u0306|\u031B/g, ""); // Â, Ê, Ă, Ơ, Ư
  return str;
}

$(document).ready(async function () {
  function renderCategory(id) {
    $.ajax({
      type: "get",
      url: `api/category/list.php`,
      success: function (data) {
        let htmls = `<option ${
          id != null ? `selected` : ``
        } value=0 >---- Tất Cả ----</option>`;
        data.forEach((item) => {
          htmls += `<option ${id == item.id ? `selected` : ``} value=${
            item.id
          }>${item.name}</option>`;
        });
        $(".form-filter-category").html(htmls);
      },
    });
  }
  function renderListProducts(data) {
    // key=${key}&cate=${cate}&page=${page}&sort=${sort}
    $.ajax({
      type: "get",
      url: `api/product/search.php?${data}`,
      success: function (data) {
        console.log(data);
        if (data.totalNumber == 0) {
          $(".content-search-result").html("");
          console.log($(".see-more-container"));
          $(".see-more-container").html(
            `<img src="./images/no-product-found.png" alt="" width='100%' class="img-not-found-product">`
          );
        } else {
          let products = data.products;
          let htmls = "";
          $(".heading-search").html(
            `Kết quả tìm kiếm '<strong>${keyword}</strong>' cho: ${data.totalNumber} kết quả`
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
            <div class="col-md-3 col-sm-6 col-6 p-0 ">
              <div class="product-box">
                <a href="./product.php?id=${item.id}">
                  <div class="product-inner-box position-relative">
                    <div class="onsale_2 position-absolute top-0 start-0">
                      ${
                        item.price_per != null
                          ? ` <span class="badge_2 rounded-0">
                        <!-- <i class="fa-solid fa-arrow-down"></i> -->
                        ${item.price_per}%
                      </span>`
                          : ``
                      }
                    </div>
                    <div class="product-img">
                      <img src="./images/products/${
                        item.img
                      }" alt="woodan chair" class="img-fluid">
                    </div>
                  </div>
                  <div class="product-info">
                    <div class="product-name">
                      <h3 class="text-black">${item.name}</h3>
                    </div>
                    <div class="product-price d-flex justify-content-between">
                      ${
                        item.discountedPrice == null
                          ? `<span>${priceToVND(item.price)}</span>`
                          : `<span>${priceToVND(item.discountedPrice)}</span>
                      <span class="text-muted text-decoration-none" style="font-size: 13px;"><del>${priceToVND(
                        item.price
                      )}</del></span>`
                      }
                    </div>
                  </div>
                </a>
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
          console.log($(".see-more-container"));
          $(".see-more-container").html(btn_pagination);
        }
      },
    });
  }

  let keyword = new URL(location.href).searchParams.get("key") || "";
  let cate = new URL(location.href).searchParams.get("cate") || "";
  let page = new URL(location.href).searchParams.get("page") || "";
  let sort = new URL(location.href).searchParams.get("sort") || "";
  key = toNonAccentVietnamese(keyword);
  await renderListProducts(`key=${key}&cate=${cate}&page=${page}&sort=${sort}`);

  await renderCategory(cate);
  $(".form-filter-price").change(async function () {
    showLoading();
    if ($(".form-filter-price").val() == "desc") {
      renderListProducts(`key=${key}&cate=${cate}&page=${page}&sort=desc`);
    } else {
      renderListProducts(`key=${key}&cate=${cate}&page=${page}&sort=asc`);
    }
    hideLoading();
  });
  $(".form-filter-category").change(function () {
    let cate = $(".form-filter-category").val();
    if (cate == 0) {
      renderListProducts(`key=${key}&cate=&page=${page}&sort=${sort}`);
    } else {
      renderListProducts(`key=${key}&cate=${cate}&page=${page}&sort=${sort}`);
    }
  });

  await hideLoading();
});
