<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <?php session_start(); ?>
  <!--  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!--  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js" integrity="sha512-v3ygConQmvH0QehvQa6gSvTE2VdBZ6wkLOlmK7Mcy2mZ0ZF9saNbbk19QeaoTHdWIEiTlWmrwAL4hS8ElnGFbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <style>
    * {
      box-sizing: border-box;
      padding: 0;
      margin: 0;
    }

    body {
      line-height: 1;
    }
  </style>
</head>

<body class="bg-light">
  <div class="content ">


    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 g-3">

        <div class="col">
          <div class="card p-3 bg-white">
            <div class="row justify-content-center align-items-center">
              <div class="col-8">
                <h5>Tổng Số Khánh Hàng</h5>
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
                <h5>Tổng Số Đơn Hàng</h5>
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
                <h5>Tổng Số Nhân Viên</h5>
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
                <h5>Tổng Số Danh Thu</h5>
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
          <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Top Khách Hàng Order Nhiều Nhất</button>
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
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Top Sản Phẩm Mua Nhiều Nhất</div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">Top Loại Sản Phẩm Mua Nhiều Nhất</div>
      </div>
    </div>
  </div>
  <?php require_once "footer.php"; ?>
</body>
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

</html>