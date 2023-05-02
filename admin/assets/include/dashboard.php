  <main id="dashboard_container" class="main_content mt-5">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 g-3">

        <div class="col">
          <div class="card p-3 bg-white">
            <div class="row justify-content-center align-items-center">
              <div class="col-8">
                <h5 class="text-center">Khánh Hàng</h5>
                <h5 class="text-danger">10.000</h5>
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
                <h5 class="text-danger">10.000</h5>
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
                <h5 class="text-danger">10.000</h5>
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
                <h5 class="text-center">Danh Thu</h5>
                <h5 class="text-danger">10.000</h5>
              </div>
              <div class="col-4 fs-1 text-center">
                <i class="fa-solid fa-money-bill-trend-up"></i>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="container">
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
    </div>
    <!-- thong ke so don hang trong thang -->
    <div class="container my-3">
      <div class="row">
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
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Top Sản Phẩm Mua
          Nhiều Nhất</div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">Top Loại Sản Phẩm
          Mua Nhiều Nhất</div>
      </div>
    </div>
    <script>
      var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
      var yValues = [105, 49, 44, 24, 15];
      var barColors = ["red", "green", "blue", "orange", "brown"];
      new Chart("myChart", {
        type: "bar",
        data: {
          labels: xValues,
          datasets: [{
            backgroundColor: barColors,
            data: yValues
          }]
        },
        options: {}
      });
      new Chart("myChartPie", {
        type: "pie",
        data: {
          labels: xValues,
          datasets: [{
            backgroundColor: barColors,
            data: yValues
          }]
        },
        options: {
          title: {
            display: true,
            text: "World Wide Wine Production 2018"
          }
        }
      });
      new Chart("sumQuantitySell", {
        type: "line",
        data: {
          labels: xValues,
          datasets: [{
            backgroundColor: barColors,
            data: yValues
          }]
        },
        options: {
          title: {
            display: true,
            text: "World Wide Wine Production 2018"
          }
        }
      });
    </script>
  </main>