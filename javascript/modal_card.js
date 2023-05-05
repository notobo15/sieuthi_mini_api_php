async function increase(id, price) {
  await showLoading();
  let fd = new FormData();
  fd.append("product_id", id);
  fd.append("quantity", 1);
  fd.append("price", price);
  await $.ajax({
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

async function decrease(id, price) {
  await showLoading();
  let fd = new FormData();
  fd.append("product_id", id);
  fd.append("quantity", -1);
  fd.append("price", price);
  await $.ajax({
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
      },
    });
  }
}

function clearAll() {
  showLoading();
  $.ajax({
    type: "post",
    url: "api/accounts/cart/clear.php",
    success: function (data) {
      window.location.reload();
    },
  });
  // hideLoading();
}

async function createOrder() {
  // await showLoading();
  if (confirm("Bạn Chắc Chắn Muốn Đặt Hàng?")) {
    await $.ajax({
      type: "post",
      url: "api/accounts/orders/create.php",
      success: function (data) {
        console.log(data);
        alert("Bạn đã đặt hàng thành công.");
        window.location.assign("./order.php");
        // hideLoading();
      },
      error: function (error) {
        if (error.status == 403) {
          alert("Bạn Cần Đăng Nhập Để Đặt Hàng.");
          location.assign("login_register.php");
        }
      },
    });
  }
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
               <button class="minus_card" ${
                 item.quantity <= 1 ? `disabled` : ``
               } onClick="return decrease(${item.product_id},${
          item.price
        } )"><i class="fa-solid fa-minus"></i></button>
               <input type="text" value="${item.quantity}" readonly />
               <button class="plus_card" onClick="return increase(${
                 item.product_id
               }, ${item.price})"><i class="fa-solid fa-plus"></i></button>
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
