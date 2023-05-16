// const oderElement = document.querySelector(`.icon-oder`);
// const modaloder = document.querySelector(`.modal_oder`);
// const closeoder = document.querySelector(`.icon-close-oder`);
// oderElement.addEventListener("click", function (e) {
//   modaloder.style.display = "block";
// });
function updateStatus(id, status) {
  if (confirm("Bạn Có Chắc Chắn Muốn Hủy?")) {
    let fd = new FormData();
    fd.append("status", status);
    fd.append("id", id);
    $.ajax({
      type: "POST",
      url: "./api/accounts/orders/status.php",
      processData: false,
      contentType: false,
      data: fd,
      success: function (data) {
        renderOrder();
      },
    });
  }
}
function renderOrder() {
  let total = 0;
  $.ajax({
    url: "api/accounts/orders/list.php",
    type: "get",
    success: function (data) {
      console.log(data);
      let html = "";
      data.forEach((item) => {
        // total += item.quantity * item.price;
        html += `
        <tr class="bg-light">
            <td data-th="Mã đơn hàng :" class="my-3">
                <strong class="text-danger MDH">${item.id}</strong>
            </td>
            <td data-th="Thời gian :">${item.order_date}</td>
            <td data-th="Chi Tiết Đơn Hàng :">
                <span class="">${item.product_detail}</span>
            </td>
            <td data-th="Tổng tiền :">${priceToVND(item.totalPrice)}</td>
            <td data-th="Tình trạng :">
            ${item.status}
            </td>
            <td class="actions-2" data-th="">
            ${
              item.status == "hủy bỏ"
                ? `<button class="btn btn-danger disabled btn-sm text-white"><i class="fa-solid fa-trash"></i> Hủy đơn hàng
            </button>`
                : `<button class="btn btn-danger btn-sm text-white" onclick="return updateStatus('${item.id}', 'hủy bỏ')"><i class="fa-solid fa-trash"></i> Hủy đơn hàng
                </button>
            </td>
          `
            }
        </tr>
        `;
      });

      $("tbody").html(html);
      //   $(".total-price").html(total);
    },
  });
}
renderOrder();
hideLoading();
