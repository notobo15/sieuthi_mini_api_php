const oderElement = document.querySelector(`.icon-oder`);
const modaloder = document.querySelector(`.modal_oder`);
const closeoder = document.querySelector(`.icon-close-oder`);
oderElement.addEventListener("click", function (e) {
  modaloder.style.display = "block";
});
closeoder.addEventListener("click", function (e) {
  modaloder.style.display = "none";
});
$(".icon-oder").click(function (params) {
  renderOrder();
});
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
        <tr>
            <td data-th="Mã đơn hàng :" class="my-3">
                <strong class="text-danger MDH">${item.id}</strong>
            </td>
            <td data-th="Thời gian :">10:34 20/02/2023</td>
            <td data-th="Email :">
                <ins class="text-danger :">skt@gmai.com</ins>
            </td>
            <td data-th="Tổng tiền :">${item.totalPrice}</td>
            <td data-th="Tình trạng :">
            ${item.status}
            </td>
            <td class="actions-2" data-th="">
                <button class="btn btn-danger btn-sm text-black"><i class="fa-solid fa-trash"></i> Hủy đơn hàng
                </button>
            </td>
        </tr>
        `;
      });

      $(".moda-card-info tbody").html(html);
      //   $(".total-price").html(total);
    },
  });
}
