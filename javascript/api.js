$(document).ready(function () {
  $.ajax({
    type: "GET",
    url: "./api/category/list.php",
    success: function (data) {
      console.log(data);
      let inHTML = " ";
      // ------------------------------------------------------------------------------------------------------------------------
      // add khung category ------------------------------------------------------------------------------------------------------------------------
      data.forEach(function (item, index) {
        if (index < 4) {
          inHTML += `
            <div class="container-grounpfreature">
            <div class="title-grounpfeature" style=" background: linear-gradient(to left top, rgb(244, 248, 136), green);">
                   <h3 class="fs-4  text-uppercase">${item.name}</h3>
                 </div>
            <div class="row pb-2 px-3 grounp-category" data=${item.id}>
            
              
            </div>
          </div>
          <div class=" see-more-container my-2">
            <div class="see-more-grounpfeature">
              <a href="search.php?cate=${item.id}&page=1"> Xem thêm sản phẩm...</a>
            </div>
          </div>
            `;
        }
        if (index > 3 && index < 8) {
          inHTML += `
              <div class="container-grounpfreature">
            <div class="title-grounpfeature" style=" background: linear-gradient(to left top, rgb(228, 255, 91), #ff4141);">
                   <h3 class="fs-4  text-uppercase">${item.name}</h3>
                 </div>
            <div class="row pb-2 px-3 grounp-category" data=${item.id}>
            
              
            </div>
          </div>
          <div class=" see-more-container my-2">
            <div class="see-more-grounpfeature">
              <a href="search.php?cate=${item.id}&page=1"> Xem thêm sản phẩm...</a>
            </div>
          </div>
            `;
        }
        if (index > 7) {
          inHTML += `
              <div class="container-grounpfreature-2">
              <div class="title-grounpfeature-2">
                  <div class="heart-grounpfeature-2"></div>
                  <h3 class="fs-4 text-uppercase">${item.name}</h3>
              </div>
              <div class="row pb-2 px-3 grounp-category " data=${item.id}>
              
                
              </div>
            </div>
            <div class=" see-more-container my-2">
              <div class="see-more-grounpfeature">
                <a href="search.php?cate=${item.id}&page=1"> Xem thêm sản phẩm...</a>
              </div>
            </div>
              `;
        }
      });
      // console.log(inHTML);
      $(".myGrounpFeature1").html(inHTML);
      // -------------------------------------------------------------------------------------------
      // add sản phẩm vào trong category-------------------------------------------------------------------------------------------
      const categr = document.querySelectorAll(`.grounp-category`);
      categr.forEach(function (item) {
        let category_id = $(item).attr("data");
        let textTO = " ";
        $.ajax({
          type: "GET",
          url: `./api/category/detail.php?id=${category_id}`,
          success: function (data) {
            let products = data.products;
            let textHTML = " ";
            console.log(products.length);
            if (products.length > 4) {
              products = products.filter((item, index) => {
                return index < 4;
              });
            }

            products.forEach(function (i) {
              // textHTML = `
              //   <div class="col-md-3 col-sm-6 col-6 p-0 ">
              //   <div class="product-box">
              //     <div class="product-inner-box position-relative">
              //       <div class="icons position-absolute">
              //         <a href="./product.php?id=${
              //           i.id
              //         }" class="text-decoration-none"><i class="fa-solid fa-eye"></i></a>
              //         <a href="#" class="text-decoration-none"><i class="fa-solid fa-cart-plus"></i></a>
              //       </div>
              //       <div class="onsale_2 position-absolute top-0 start-0">
              //         <span class="badge_2 rounded-0">
              //        <!-- <i class="fa-solid fa-arrow-down"></i> -->
              //         Mới
              //       </span>
              //       </div>
              //       <div class="product-img">
              //         <img src="./images/products/${
              //           i.img
              //         }" alt="woodan chair" class="img-fluid">
              //       </div>
              //       <div class="cart-btn">
              //         <button class="btn btn-white bg-white shadow-sm rounded-pill" data="${
              //           i.product_id
              //         }" data1="${i.name}" data2="${
              //   data.id
              // }"><i class="fa-solid fa-cart-shopping"></i>Mua Ngay</button>
              //       </div>
              //     </div>
              //     <div class="product-info">
              //       <div class="product-name">
              //         <h3>${i.name}</h3>
              //       </div>
              //       <div class="product-price">
              //         <span>${parseFloat(i.price).toLocaleString(
              //           `de-DE`
              //         )} đ</span>
              //       </div>
              //     </div>
              //   </div>
              //   </div>
              //   `;
              textHTML = `
              <div class="col-md-3 col-sm-6 col-6 p-0 ">
                <div class="product-box">
                  <a href="./product.php?id=${i.id}">
                    <div class="product-inner-box position-relative">
                      <div class="onsale_2 position-absolute top-0 start-0">
                        <span class="badge_2 rounded-0">
                          <!-- <i class="fa-solid fa-arrow-down"></i> -->
                          Mới
                        </span>
                      </div>
                      <div class="product-img">
                        <img src="./images/products/${
                          i.img
                        }" alt="woodan chair" class="img-fluid">
                      </div>
                    </div>
                    <div class="product-info">
                      <div class="product-name">
                        <h3 class="text-black">${i.name}</h3>
                      </div>
                      <div class="product-price">
                        <span>${parseFloat(i.price).toLocaleString(
                          `de-DE`
                        )} </span>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              `;
              textTO += textHTML;
            });
            item.innerHTML = textTO;
          },
        });
      });
    },
  });
});
