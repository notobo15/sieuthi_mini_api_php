function increase(id) {
  showLoading();
  let fd = new FormData();
  fd.append("product_id", id);
  fd.append("quantity", 1);
  $.ajax({
    type: "post",
    url: "api/accounts/cart/create.php",
    processData: false,
    contentType: false,
    data: fd,
    success: function (data) {
      console.log(data);
      renderCart();
      hideLoading();
    },
  });
}
function deleteProductCart(id) {
  if (confirm("Bạn có muốn xóa!")) {
    // showLoading();
    let fd = new FormData();
    fd.append("product_id", id);
    $.ajax({
      type: "post",
      url: "api/accounts/cart/delete.php",
      processData: false,
      contentType: false,
      data: fd,
      success: function (data) {
        console.log(data);
        // renderCart();
        window.location.reload();
        hideLoading();
      },
    });
  }
}
function decrease(id) {
  showLoading();
  let fd = new FormData();
  fd.append("product_id", id);
  fd.append("quantity", -1);
  $.ajax({
    type: "post",
    url: "api/accounts/cart/create.php",
    processData: false,
    contentType: false,
    data: fd,
    success: function (data) {
      console.log(data);
      renderCart();
      hideLoading();
    },
  });
  // hideLoading();
}

function renderCart() {
  let total = 0;
  $.ajax({
    url: "api/accounts/cart/list.php",
    type: "get",
    success: function (data) {
      console.log(data);
      let html = "";
      data.forEach((item) => {
        total += item.quantity * item.price;
        html += `
         <tr>
           <td data-th="Sản Phẩm" class="my-3">
             <div class="row">
               <div class="col-sm-4 hidden-md"><img
                   src="images/products/${item.img}" alt="Sản phẩm 1"
                   class="img-responsive" width="100">
               </div>
               <div class="col-sm-8 fs-6">
                 <h4 class="nomargin fs-6">${item.name}</h4>
                 <p>Nhập khẩu trực tiếp từ Korea</p>
               </div>
             </div>
           </td>
           <td data-th="Giá">${priceToVND(item.price)}</td>
           <td data-th="Số lượng">
             <div class="number_card">
               <span class="minus_card" onClick="return decrease(${
                 item.product_id
               })"><i class="fa-solid fa-minus"></i></span>
               <input type="text" value="${item.quantity}" min="1" />
               <span class="plus_card" onClick="return increase(${
                 item.product_id
               })"><i class="fa-solid fa-plus"></i></span>
             </div>
           </td>
           <td data-th="Tổng tiền" class="text-center">${priceToVND(
             item.price * item.quantity
           )}</td>
           <td class="actions" data-th="">
             <button class="btn btn-danger btn-sm text-white" onClick="deleteProductCart(${
               item.product_id
             })"><i class="fa-solid fa-trash"></i>
             </button>
           </td>
         </tr>
         `;
      });

      $(".add-card-product").html(html);
      $(".total-price-cart*").html(priceToVND(total));
    },
  });
}

renderCart();
hideLoading();
