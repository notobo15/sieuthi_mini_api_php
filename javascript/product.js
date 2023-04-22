$(document).ready(async function () {
  await $.ajax({
    type: "GET",
    url: "./api/product/list.php",
    success: function (data) {
      let html = "";
      data.forEach(function (item, index) {
        if (index < 16) {
          html += `
                <div class="col-md-3 col-sm-6 col-6 p-0 ">  
                     <div class="product-box">
                       <div class="product-inner-box position-relative">
                         <div class="icons position-absolute">
                           <a href="./product.php?id=${item.id}" data="${
            item.id
          }" class="text-decoration-none icon_eye_product"><i class="fa-solid fa-eye"></i></a>
                           <a href="#" class="text-decoration-none"><i class="fa-solid fa-cart-plus"></i></a>
                         </div>
                         <div class="onsale position-absolute top-0 start-0">
                           <span class="badge rounded-0"><i class="fa-solid fa-arrow-down"></i> 45%</span>
                         </div>
                         <div class="product-img">
                           <img src="./images/products/${
                             item.img
                           }" alt="woodan chair" class="img-fluid">
                         </div>
                         <div class="cart-btn-2">
                           <button data=${
                             item.id
                           } class="btn btn-white bg-white shadow-sm rounded-pill btn-product-add"><i class="fa-solid fa-cart-shopping"></i>Mua Ngay</button>
                         </div>
                       </div>
                       <div class="product-info">
                         <div class="product-name">
                           <h3>${item.name}</h3>
                         </div>
                         <div class="product-price">
                           <span>${parseFloat(item.price).toLocaleString(
                             `de-DE`
                           )}</span>đ
                         </div>
                       </div>
                     </div>
                     </div>
                `;
        }
      });
      $(".product-list").html(html);
      // -----------------------------------------------------------------------------------------------------------------------------------------
      // -----------------------------------------------------------------------------------------------------------------------------------------
      // click thông tin sản phẩm ----------------------------------------------------------------------------------------------------------------------

      // end click thông tin sản phẩm ----------------------------------------------------------------------------------------------------------------
      // -----------------------------------------------------------------------------------------------------------------------------------------
      // click thêm sản phẩm vào giỏ hàng ----------------------------------------------------------------------------------------------------------------
      $(".cart-btn-2 button").click(function () {
        let product_id = $(this).attr("data");
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
                     <div class="number_card_2">
                       <span class="minus_card_2" data="${data.price}" data2="${
              data.id
            }"><i class="fa-solid fa-minus"></i></span>
                       <input type="text" value="1" min="1"/>
                       <span class="plus_card_2" data="${data.price}" data2="${
              data.id
            }"><i class="fa-solid fa-plus"></i></span>
                     </div>
                    </td> 
                    <td id="price_card_2" data-th="Tổng tiền" class="text-center text-danger card_total_2"  data= "${
                      data.price
                    }" data2="${data.id}" data3=" ">${parseFloat(
              data.price
            ).toLocaleString(`de-DE`)} đ</td> 
                    <td class="actions" data-th="">
                     <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                     </button> 
                     <button class="btn btn-danger btn-sm text-black btn-remove-card-2 " data2="${
                       data.name
                     }" data="${data.id}"><i class="fa-solid fa-trash"></i>
                     </button>
                    </td> 
                   </tr>
                    `;
            $(".add-card-product").append(html123);
            alert(` Sản phẩm ${data.name} đã được thêm vào giỏ hàng !`);
            //  ---------------------------------------------------------------------------------------------------------------
            //  click số lưọng sản phẩm---------------------------------------------------------------------------------------------------------------
            $(`.minus_card_2`).click(function () {
              let productID = $(this).attr(`data2`);
              if (data.product_id == productID) {
                let Element_price = $(this)
                  .parent()
                  .parent()
                  .parent()
                  .find(`#price_card_2`);
                let Element_Input = $(this).parent().find("input");
                let ValuePrice = $(Element_price).attr("data");
                let countI = parseInt(Element_Input.val()) - 1;
                countI = countI < 1 ? 1 : countI;
                Element_Input.val(countI);
                Element_Input.change();
                let price = parseFloat(ValuePrice * countI);
                Element_price.html(price.toLocaleString(`de-DE`) + ` đ`);
                Element_price.attr("data3", price);
                return false;
              }
            });
            $(".plus_card_2").click(function () {
              let productID = $(this).attr("data2");
              if (data.product_id == productID) {
                let Element_price = $(this)
                  .parent()
                  .parent()
                  .parent()
                  .find(`#price_card_2`);
                let Element_input = $(this).parent().find("input");
                let ValuePrice = $(Element_price).attr("data");
                Element_input.val(parseInt(Element_input.val()) + 1);
                Element_input.change();
                let countI = Element_input.val();
                let price = parseFloat(ValuePrice * countI);
                Element_price.html(price.toLocaleString(`de-DE`) + ` đ`);
                Element_price.attr("data3", price);
              }
            });
            //  ---------------------------------------------------------------------------------------------------------------
            //  xóa sản phẩm trong giỏ hàng ---------------------------------------------------------------------------------------------------------------
            $(".btn-remove-card-2").click(function () {
              let parenProduc = $(this).parent();
              let product_id = $(this).attr("data");
              let textNamesp = $(this).attr("data2");
              if (data.product_id == product_id) {
                parenProduc.parent().remove();
                alert(`Đã xóa sản phẩm ${textNamesp} khỏi giỏ hàng !`);
              }
            });
          },
          error: function (jqXHR, textStatus, errorThrown) {},
        });
      });

      // --------------------------------------------------------------------------------------------------------------------------------------------------
      // add sản phẩm vào giỏ hàng--------------------------------------------------------------------------------------------------------------------------------------------------

      // end click add card--------------------------------------------------------------------------------------------------------------------------------------------------
    },
    error: function (e) {},
  });
});
