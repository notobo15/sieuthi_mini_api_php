$(document).ready(async function () {
  await $.ajax({
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
            <div class="title-grounpfeature" style=" background: linear-gradient(to left top,rgb(216, 61, 61),rgb(216, 61, 61));">
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
            <div class="title-grounpfeature" style=" background: linear-gradient(to left top,rgb(216, 61, 61),rgb(216, 61, 61));">
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
            if (products.length > 4) {
              products = products.filter((item, index) => {
                return index < 4;
              });
            }

            products.forEach(function (item) {
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
              <a href="./product.php?id=${item.id}">
                <div class="product-inner-box position-relative">
                  <div class="onsale_2 position-absolute top-0 start-0">
                    ${
                      item.price_per != null
                        ? ` <span class="badge_2 rounded-0">
                       <!-- <i class="fa-solid fa-arrow-down"></i>  -->
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
                  <div class="product-price pt-2">
                    ${
                      item.discountedPrice == null
                        ? `<span>${priceToVND(item.price)}</span>`
                        : `<div class="row">
                        <div class="col-sm-6 col-lg-6 col-md-12 col-12">
                          <span id = "price_discoun">${priceToVND(item.discountedPrice)}</span>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-md-12 col-12 text-end">
                          <span class="text-muted text-decoration-none" style="font-size: 16px;"><del>${priceToVND(
                            item.price
                          )}</del></span>
                        </div>
                      </div>`
                    }

                  </div>
                </div>
              </a>
            </div>
          </div>
              `;
              console.log(item.discountedPrice);
              textTO += textHTML;
            });
            item.innerHTML = textTO;
          },
        });
      });
    },
  });

  await hideLoading();
});
