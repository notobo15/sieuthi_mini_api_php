$(document).ready(function () {
  $.ajax({
    type: "GET",
    url: "./api/category/list.php",
    success: function (data) {
      console.log("data cate");
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
              <a href="#"> Xem thêm sản phẩm...</a>
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
              <a href="#"> Xem thêm sản phẩm...</a>
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
                <a href="#"> Xem thêm sản phẩm...</a>
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
            let textHTML = " ";
            data.products.forEach(function (i) {
              textHTML = ` 
                <div class="col-md-3 col-sm-6 col-6 p-0 ">
                <div class="product-box">
                  <div class="product-inner-box position-relative">
                    <div class="icons position-absolute">
                      <a href="./product.php?id=${
                        i.product_id
                      }" class="text-decoration-none"><i class="fa-solid fa-eye"></i></a>
                      <a href="#" class="text-decoration-none"><i class="fa-solid fa-cart-plus"></i></a>
                    </div>
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
                    <div class="cart-btn">
                      <button class="btn btn-white bg-white shadow-sm rounded-pill" data="${
                        i.product_id
                      }" data1="${i.name}" data2="${
                data.id
              }"><i class="fa-solid fa-cart-shopping"></i>Mua Ngay</button>
                    </div>
                  </div>
                  <div class="product-info">
                    <div class="product-name">
                      <h3>${i.name}</h3>
                    </div>
                    <div class="product-price">
                      <span>${parseFloat(i.price).toLocaleString(
                        `de-DE`
                      )} đ</span> 
                    </div>
                  </div>
                </div>
                </div>
                `;
              textTO += textHTML;
            });
            item.innerHTML = textTO;
            // -------------------------------------------------------------------------------------------------------
            // click add cart------------------------------------------------------------------------------------------
            $(".cart-btn button").click(function () {
              let product_id = $(this).attr("data");
              let checkCategory_id = $(this).attr("data2");
              if (category_id == checkCategory_id) {
                $.ajax({
                  type: "GET",
                  url: `./api/product/detail.php?id${product_id}`,
                  success: function (data) {
                    let html123 = " ";
                    html123 = `
                        <tr> 
                        <td data-th="Sản Phẩm" class="my-3"> 
                          <div class="row"> 
                          <div class="col-sm-4 hidden-md"><img src="./images/products/${
                            data.img
                          }" alt="Sản phẩm 1" class="img-responsive" width="100">
                          </div> 
                          <div class="col-sm-8 fs-6"> 
                           <h4 class="nomargin fs-6">${data.name}</h4> 
                           <p>Nhập khẩu trực tiếp từ ${data.makeIn}</p> 
                          </div> 
                          </div> 
                        </td> 
                        <td data-th="Giá">${data.price} đ</td> 
                        <td data-th="Số lượng">
                         <div class="number_card">
                           <span class="minus_card" data="${
                             data.price
                           }" data2="${
                      data.id
                    }"><i class="fa-solid fa-minus"></i></span>
                           <input type="text" value="1" min="1"/>
                           <span class="plus_card" data="${
                             data.price
                           }" data2="${
                      data.id
                    }"><i class="fa-solid fa-plus"></i></span>
                         </div>
                        </td> 
                        <td id= "price-card" data-th="Tổng tiền" class="text-center text-danger card_total" data= "${
                          data.price
                        }" data2="${data.id}" data3=" ">${parseFloat(
                      data.price
                    ).toLocaleString(`de-DE`)} đ</td> 
                        <td class="actions" data-th="">
                         <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                         </button> 
                         <button class="btn btn-danger btn-sm text-black btn-remove-card" data="${
                           data.name
                         }" data2="${data.id}"><i class="fa-solid fa-trash"></i>
                         </button>
                        </td>
                       </tr>
                        `;
                    $(".add-card-product").append(html123);
                    alert(` Sản phẩm ${data.name} đã được thêm vào giỏ hàng !`);

                    //  ---------------------------------------------------------------------------------------------------------------
                    //  click số lưọng sản phẩm và sủa giá tiền---------------------------------------------------------------------------------------------------------------
                    $(`.minus_card`).click(function () {
                      let productID = $(this).attr(`data2`);
                      if (data.id == productID) {
                        let Element_price = $(this)
                          .parent()
                          .parent()
                          .parent()
                          .find(`#price-card`);
                        let Element_Input = $(this).parent().find("input");
                        let ValuePrice = $(Element_price).attr("data");
                        let countI = parseInt(Element_Input.val()) - 1;
                        countI = countI < 1 ? 1 : countI;
                        Element_Input.val(countI);
                        Element_Input.change();
                        let price = parseFloat(ValuePrice * countI);
                        Element_price.html(
                          price.toLocaleString(`de-DE`) + ` đ`
                        );
                        Element_price.attr("data3", price);
                        return false;
                      }
                    });
                    $(".plus_card").click(function () {
                      let productID = $(this).attr("data2");
                      if (data.id == productID) {
                        let Element_price = $(this)
                          .parent()
                          .parent()
                          .parent()
                          .find(`#price-card`);
                        let Element_input = $(this).parent().find("input");
                        let ValuePrice = $(Element_price).attr("data");
                        Element_input.val(parseInt(Element_input.val()) + 1);
                        Element_input.change();
                        let countI = Element_input.val();
                        let price = parseFloat(ValuePrice * countI);
                        Element_price.html(
                          price.toLocaleString(`de-DE`) + ` đ`
                        );
                        Element_price.attr("data3", price);
                      }
                    });
                    //  ---------------------------------------------------------------------------------------------------------------
                    //  xóa sản phẩm trong giỏ hàng ---------------------------------------------------------------------------------------------------------------
                    $(".btn-remove-card").click(function () {
                      let parenProduc = $(this).parent();
                      let product_id = $(this).attr("data2");
                      let textNamesp = $(this).attr("data");
                      if (data.id == product_id) {
                        parenProduc.parent().remove();
                        alert(`Đã xóa sản phẩm ${textNamesp} khỏi giỏ hàng !`);
                      }
                    });
                    // end xóa ---------------------------------------------------------------------------------------------------------------
                  },
                  error: function (jqXHR, textStatus, errorThrown) {},
                });
              }
            });
          },
        });
      });
    },
  });
});
