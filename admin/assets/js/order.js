function LoadOrder() {
  return new Promise((resolve, reject) => {
    var xml = new XMLHttpRequest();

    xml.open("GET", "../api/accounts/orders/get_all.php", true);
    xml.send();
    xml.onload = function () {
      let orders = JSON.parse(this.responseText);
      // orders.reverse();
      let html = ``;
      console.log(orders);

      for (const order of orders) {
        html += `<tr>
                <td>${order.id}</td>
                <td>${order.order_date}</td>
                <td>${order.totalPrice}</td>
                <td>${order.product_detail}</td>
                <td>
                    <p class="status ${
                      order.status.toLowerCase() == "thành công"
                        ? "approved"
                        : order.status.toLowerCase() == "hủy bỏ"
                        ? `delayed`
                        : `processing`
                    } ">${order.status}</p>
                </td>
                <td>
                    <button class="btn fs-6 approve" ${
                      order.status.toLowerCase() == "thành công" ||
                      order.status.toLowerCase() == "hủy bỏ"
                        ? `disabled `
                        : ``
                    } onclick="updateStatus('${
          order.id
        }', 'thành công')" value="${order.id}">Thành Công</button>
                    <button class="btn fs-6 delay" value="${
                      order.id
                    }" onclick="updateStatus('${order.id}', 'hủy bỏ')" ${
          order.status.toLowerCase() == "thành công" ||
          order.status.toLowerCase() == "hủy bỏ"
            ? `disabled `
            : ``
        }>Hủy Bỏ</button>
                </td></tr>`;
      }
      document.querySelector("#order_container .order_table tbody").innerHTML =
        html;
      resolve();
    };

    xml.onerror = function () {
      console.log("** An error occurred during the load order");
      reject();
    };

    xml.onprogress = (event) => {
      // triggers periodically
      // event.loaded - how many bytes downloaded
      // event.lengthComputable = true if the server sent Content-Length header
      // event.total - total number of bytes (if lengthComputable)
      console.log(
        `Received ${event.loaded} of ${event.total}: ${event.lengthComputable}`
      );
    };
  });
}
function updateStatus(id, status) {
  if (confirm("Bạn Có Chắc Chắn?")) {
    let fd = new FormData();
    fd.append("status", status);
    fd.append("id", id);
    $.ajax({
      type: "POST",
      url: "../api/accounts/orders/status.php",
      processData: false,
      contentType: false,
      data: fd,
      success: function (data) {
        console.log(data);
        ReLoadOrder();
      },
    });
  }
}
function Approve() {
  var approves = document.querySelectorAll(".order_table tbody .approve");
  approves.forEach((approve) => {
    approve.addEventListener("click", () => {
      let order = approve.parentNode.parentNode;
      let status = order.querySelector(".status");

      status.classList.contains("processing")
        ? status.classList.remove("processing")
        : status.classList.remove("delayed");
      status.classList.add("approved");
      status.innerHTML = "approved";

      let xml = new XMLHttpRequest();
      xml.open("POST", `../api/accounts/order/edit/${approve.value}`);
      xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xml.send("status=Approved");
      xml.onload = function () {
        if (this.status === 200) {
          console.log(`Order approved complete - ${xml.statusText}`);
        }
      };
    });
  });
}

function View() {
  var views = document.querySelectorAll(".order_table tbody .view");
  views.forEach((view) => {
    view.addEventListener("click", () => {
      let xml = new XMLHttpRequest();
      xml.open("GET", `../api/accounts/orders/${view.value}`);
      xml.send();
      xml.onload = function () {
        let carts = JSON.parse(this.responseText);
        let rows = ``;
        for (const cart of carts) {
          rows += ` <tr>
                         <td> ${cart.id} </td>
                         <td><img src="../images/products/${cart.img}" alt=""></td>
                         <td>${cart.name}</td>
                         <td> ${cart.price} </td>
                         <td> <p class="status pending">${cart.quantity}</p></td>
                     </tr>`;
        }

        let html = document.createElement("section");
        html.id = "cart";
        html.innerHTML = `
                    <div class="cart_header">
                        <button class="close">&times;</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Id<span class="icon-arrow">&UpArrow;</span></th>
                                <th>image<span class="icon-arrow">&UpArrow;</span></th>
                                <th>Name<span class="icon-arrow">&UpArrow;</span></th>
                                <th>Price <span class="icon-arrow">&UpArrow;</span></th>
                                <th>Quantity<span class="icon-arrow">&UpArrow;</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            ${rows}
                        </tbody>
                    </table>`;
        document.querySelector(".main").appendChild(html);

        // ----------------------------------- Close cart ----------------------------------- //
        let close = document.querySelector("#cart .cart_header .close");
        close.onclick = () => {
          document
            .querySelector(".main")
            .removeChild(close.parentNode.parentNode);
        };

        window.addEventListener("click", function RmCart(event) {
          let cart = this.document.querySelector("#cart") || null;
          if (cart && event.target !== cart && !cart.contains(event.target)) {
            document.querySelector(".main").removeChild(cart);
            window.removeEventListener("click", RmCart);
          } else if (cart === null) {
            window.removeEventListener("click", RmCart);
          }
        });
      };
    });
  });
}

function Delay() {
  var delays = document.querySelectorAll(".order_table tbody .delay");
  for (const delay of delays) {
    delay.addEventListener("click", () => {
      let order = delay.parentNode.parentNode;
      let status = order.querySelector(".status");
      status.classList.contains("processing")
        ? status.classList.remove("processing")
        : status.classList.remove("approved");
      status.classList.add("delayed");
      status.innerHTML = "delayed";

      let xml = new XMLHttpRequest();
      xml.open(
        "POST",
        `http://localhost:3001/api/user/order/edit/${delay.value}`
      );
      xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xml.send("status=Delayed");
      xml.onload = function () {
        if (this.status === 200) {
          console.log(`Order delay complete - ${xml.statusText}`);
        }
      };
    });
  }
}

function SearchOrder() {
  const search = document.querySelector(
      "#discount_container .input-group input"
    ),
    table_rows = document.querySelectorAll(".discount_table tbody tr");
  // console.log(search.innerHTML);

  search.addEventListener("input", () => {
    table_rows.forEach((row, i) => {
      let table_data = row.textContent.toLowerCase(),
        search_data = search.value.toLowerCase();
      row.classList.toggle("hide", table_data.indexOf(search_data) < 0);
    });
  });
}

function ReLoadOrder() {
  var reload = document.querySelector("#order_container .reload_order");
  reload.addEventListener("click", () => {
    document
      .querySelector("#order_container .order_table tbody")
      .replaceChildren();
    LoadOrder()
      .then(() => {
        // Approve();
        View();
        // Delay();
      })
      .catch(() => {
        console.log("fail load order to table!");
      });
  });
}

//---------------------------- Active functions -------------------------------------//

LoadOrder()
  .then(() => {
    // Approve();
    View();
    // Delay();
    SearchOrder();
  })
  .catch(() => {
    console.log("fail load order to table!");
  });

ReLoadOrder();
