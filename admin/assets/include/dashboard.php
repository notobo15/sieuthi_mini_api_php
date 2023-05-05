  <main id="dashboard_container" class="main_content mt-5">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 g-3">

        <div class="col">
          <div class="card p-3 bg-white">
            <div class="row justify-content-center align-items-center">
              <div class="col-8">
                <h5 class="text-center">Khánh Hàng</h5>
                <h5 class="text-danger total-customer text-center">0</h5>
              </div>
              <div class="col-4 fs-1 text-center">
                <i class="fa-solid fa-people-group"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card p-3 bg-white">
            <div class="row justify-content-center align-items-center">
              <div class="col-8">
                <h5 class="text-center">Đơn Hàng</h5>
                <h5 class="text-danger total-order text-center">0</h5>
              </div>
              <div class="col-4 fs-1 text-center">
                <i class="fa-solid fa-cart-shopping"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card p-3 bg-white">
            <div class="row justify-content-center align-items-center">
              <div class="col-8">
                <h5 class="text-center">Nhân Viên</h5>
                <h5 class="text-danger total-employee text-center">0</h5>
              </div>
              <div class="col-4 fs-1 text-center">
                <i class="fa-solid fa-user-group"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card p-3 bg-white">
            <div class="row justify-content-center align-items-center">
              <div class="col-8">
                <h5 class="text-center ">Danh Thu</h5>
                <h5 class="text-danger total-price text-center">0</h5>
              </div>
              <div class="col-4 fs-1 text-center">
                <i class="fa-solid fa-money-bill-trend-up"></i>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- <div class="container">
      <div class="row my-3">

        <div class="col-12 col-md-7 col-lg-8 col-xl-8 align-self-end ">
          <div class="m-1 border bg-white">
            <canvas id="myChart" class="w-100"></canvas>
          </div>
        </div>
        <div class="col-12 col-md-5 col-lg-4 col-xl-4 align-self-end">
          <div class="m-1 border bg-white">
            <canvas id="myChartPie" style="width: 80%;"></canvas>

          </div>

        </div>

      </div>
    </div> -->
    <!-- thong ke so don hang trong thang -->
    <div class="container my-3">
      <div class="row">
        <div class="col-3">
          <select class="form-select" id="month">
            <option value="0" >Cả Năm</option>
            <option value="1">Tháng 1</option>
            <option value="2">Tháng 2</option>
            <option value="3">Tháng 3</option>
            <option value="4">Tháng 4</option>
            <option value="5" selected>Tháng 5</option>
            <option value="6">Tháng 6</option>
            <option value="7">Tháng 7</option>
            <option value="8">Tháng 8</option>
            <option value="9">Tháng 9</option>
            <option value="10">Tháng 10</option>
            <option value="11">Tháng 11</option>
            <option value="12">Tháng 12</option>
          </select>
        </div>
        <div class="col-3">
          <select class="form-select" id="year">
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023" selected>2023</option>
          </select>
        </div>
        <div class="col-12 p-4 mt-5 border bg-white">
          <canvas id="sumQuantitySell"></canvas>
        </div>
      </div>

    </div>
    <div class="container bg-white my-5">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Top Khách Hàng Order Nhiều
            Nhất</button>
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Top Sản Phẩm Mua Nhiều Nhất</button>
          <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Top Loại Sản Phẩm Mua Nhiều Nhất</button>
        </div>
      </nav>
      <div class="tab-content bg-white mb-2" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Họ Và Tên</th>
                <th scope="col">Số Điện Thoại</th>
              </tr>
            </thead>
            <tbody class="table-customer">

            </tbody>
          </table>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Họ Và Tên</th>
                <th scope="col">Số Điện Thoại</th>
                <th scope="col">Role Id</th>
              </tr>
            </thead>
            <tbody class="table-employee">

            </tbody>
          </table>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Xuất Xứ</th>
              </tr>
            </thead>
            <tbody class="table-product">

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script>
      var xValues = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];;
      var yValues = [];
      let xWeek = ["Tuần 1 (1 - 7)", "Tuần 2 (8 - 14)", "Tuần 3 (15 - 21)", "Tuần 4 (22 - (29-30-31))"]
      var barColors = ["red", "green", "blue", "orange", "brown", "black"];
      var ctx = document.getElementById("sumQuantitySell").getContext("2d");

      let chart = new Chart(ctx, {
        type: "line",
        data: {
          fill: false,
          labels: xValues,
          datasets: [{
            label: "",
            backgroundColor: barColors,
            data: yValues
          }]
        },

      });




      // new Chart("myChart", {
      //   type: "bar",
      //   data: {
      //     labels: xValues,
      //     datasets: [{
      //       backgroundColor: barColors,
      //       data: yValues
      //     }]
      //   },
      //   options: {}
      // });
      // new Chart("myChartPie", {
      //   type: "pie",
      //   data: {
      //     labels: xValues,
      //     datasets: [{
      //       backgroundColor: barColors,
      //       data: yValues
      //     }]
      //   },
      //   options: {
      //     title: {
      //       display: true,
      //       text: "World Wide Wine Production 2018"
      //     }
      //   }
      // });


      function priceToVND(n) {
        let res = parseFloat(n).toLocaleString(`de-DE`)
        return `${res} đ`
      }

      function countOrder() {
        $.ajax({
          url: "../api/accounts/orders/get_all.php",
          type: "GET",
          success: function(data) {
            console.log(data);
            $(".total-order").html(data.length)
            console.log(data);
            totalPrice = 0
            data.forEach((item) => {
              totalPrice += +item.totalPrice
            })
            $(".total-price").html(priceToVND(totalPrice))

            var date1Updated = new Date(data[0].order_date.replace(/-/g, '/'));
            var date2Updated = new Date(data[1].order_date.replace(/-/g, '/'));
            console.log(date1Updated > date2Updated);

          },
        });


      }

      $("#month").change(function() {
        month = ($("#month").val());
        year = ($("#year").val());
        updateChart(month, year)

      });
      $("#year").change(function() {
        month = ($("#month").val());
        year = ($("#year").val());
        updateChart(month, year)

      });
      updateChart(5, 2023)

      function updateChart(month, year) {
        if (month == 0) {
          chart.data.labels = xValues

          $.ajax({
            url: "../api/accounts/orders/get_all.php",
            type: "GET",
            success: function(data) {
              let t1 = 0
              let t2 = 0
              let t3 = 0
              let t4 = 0
              let t5 = 0
              let t6 = 0
              let t7 = 0
              let t8 = 0
              let t9 = 0
              let t10 = 0
              let t11 = 0
              let t12 = 0
              let result = data.forEach(function(item) {
                let date1 = new Date(item.order_date.replace(/-/g, '/'));
                if (date1.getFullYear() == year) {
                  if ((date1.getMonth() + 1) == 1) {
                    t1 += +item.totalPrice;
                  } else if ((date1.getMonth() + 1) == 2) {
                    t2 += +item.totalPrice
                  } else if ((date1.getMonth() + 1) == 3) {
                    t3 += +item.totalPrice
                  } else if ((date1.getMonth() + 1) == 4) {
                    t4 += +item.totalPrice
                  } else if ((date1.getMonth() + 1) == 5) {
                    t5 += +item.totalPrice
                  } else if ((date1.getMonth() + 1) == 6) {
                    t6 += +item.totalPrice
                  } else if ((date1.getMonth() + 1) == 7) {
                    t7 += +item.totalPrice
                  } else if ((date1.getMonth() + 1) == 8) {
                    t8 += +item.totalPrice
                  } else if ((date1.getMonth() + 1) == 9) {
                    t += +item.totalPrice
                  } else if ((date1.getMonth() + 1) == 10) {
                    t10 += +item.totalPrice
                  } else if ((date1.getMonth() + 1) == 11) {
                    t11 += +item.totalPrice
                  } else {
                    t12 += +item.totalPrice
                  }
                }
              })
              year_data = []
              year_data.push(t1)
              year_data.push(t2)
              year_data.push(t3)
              year_data.push(t4)
              year_data.push(t5)
              year_data.push(t6)
              year_data.push(t7)
              year_data.push(t8)
              year_data.push(t9)
              year_data.push(t10)
              year_data.push(t11)
              year_data.push(t12)
              console.log(year_data);
              chart.data.datasets[0].data = year_data
              console.log(chart.data.datasets[0].data);
              chart.update()
            },
          });
          chart.data.labels = xValues
        } else {
          $.ajax({
            url: "../api/accounts/orders/get_all.php",
            type: "GET",
            success: function(data) {
              let tuan1 = 0
              let tuan2 = 0
              let tuan3 = 0
              let tuan4 = 0
              let result = data.forEach(function(item) {
                let date1 = new Date(item.order_date.replace(/-/g, '/'));
                if ((date1.getMonth() + 1) == month && date1.getFullYear() == year) {
                  if (date1.getDay() > 0 && date1.getDay() <= 7) {
                    tuan1 += +item.totalPrice;
                  } else if (date1.getDay() >= 8 && date1.getDay() <= 15) {
                    tuan2 += +item.totalPrice;
                  } else if (date1.getDay() >= 16 && date1.getDay() <= 22) {
                    tuan3 += +item.totalPrice;
                  } else {
                    tuan4 += +item.totalPrice;

                  }
                }
                // let date2 = new Date(item.order_date.replace(/-/g, '/'));
                // console.log(date1 > date2);
              })
              arr = []
              arr.push(tuan1)
              arr.push(tuan2)
              arr.push(tuan3)
              arr.push(tuan4)
              chart.data.datasets[0].data = arr
              console.log(chart.data.datasets[0].data);
              chart.data.labels = xWeek
              chart.update()
            },
          })
        }
        chart.update()
      }

      function count() {
        $.ajax({
          url: "../api/accounts/list.php",
          type: "GET",
          success: function(data) {
            console.log(data);
            countCustomer = data.filter((item) => {
              return item.group_id == 5
            })
            countEmployee = data.filter((item) => {
              return item.group_id != 5
            })
            customer_html = ""
            countCustomer.forEach((item) => {
              customer_html += `
              <tr>
                <th scope="row">${item.id}</th>
                <td>${item.name}</td>
                <td>${item.first_name + item.first_name}</td>
                <td>${item.phone}</td>
              </tr>`
            })
            $(".table-customer").html(customer_html)

            employee_html = ""
            countEmployee.forEach((item) => {
              employee_html += `
              <tr>
                <th scope="row">${item.id}</th>
                <td>${item.name}</td>
                <td>${item.first_name + item.first_name}</td>
                <td>${item.phone}</td>
                <td>${item.group_id}</td>
              </tr>`
            })
            $(".table-employee").html(employee_html)



            $(".total-customer").html(countCustomer.length);
            $(".total-employee").html(data.length - countCustomer.length);
          },
        });
        $.ajax({
          url: "../api/product/list.php",
          type: "GET",
          success: function(data) {
            data = data.slice(0, 10)
            console.log(data);
            product_html = ""
            data.forEach((item) => {
              product_html += `
              <tr>
                <th scope="row">${item.id}</th>
                <td>${item.name}</td>
                <td>${item.price}</td>
                <td>${item.makeIn}</td>
              </tr>`
            })
            $(".table-product").html(product_html)
          },
        });


      }

      $(function() {
        countOrder()
        count()
      })
    </script>
  </main>