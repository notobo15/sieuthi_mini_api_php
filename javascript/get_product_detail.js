$(document).ready(function () {
  let url = new URL(location.href);
  let id = url.searchParams.get("id");
  console.log(1);

  console.log(id);
  console.log(url);
  $.ajax({
    type: "GET",
    url: `./api/product/detail.php?id=${id}`,
    success: function (data) {
      console.log(data);
      let html = " ";
      html = `
            <div class="myInfoProduct_Header">   
            <h4> <a href="#">Trang chủ</a> <span> > </span> <a href="#">Thịt</a> <span> > </span> <a href="#">Thịt nướng hàn quốc</a></h4>
        </div>
        <div class="row pt-4">
            <div class="col-lg-6 col-md-12 infoProduc_img">
                <img  src="./images/products/${
                  data.img
                }" alt="" style="object-fit: contain;">
            </div>
            <div class="col-lg-6 col-md-12">
                <h3> ${data.name} </h3>
                <p>HSD còn 1 năm</p>
                <div class="Infoproduct_price">
                    <h3><strong class="text-danger">${parseFloat(
                      data.price
                    ).toLocaleString(`de-DE`)} đ </strong></h3>
                    <p class="text-decoration-line-through text-danger mx-1">${parseFloat(
                      data.price + 10000
                    ).toLocaleString(`de-DE`)} đ</p>
                </div>
                <button class="btn btn-danger mt-2 bg-danger btn-infoproduct-buy">CHỌN MUA</button>
            </div>
        </div>
        <div class="information_product">
            <div class="infoto">
                 <h6>Thông tin sản phẩm</h6> 
                <div class="infotoColor"></div>
            </div>
            <p>
               <span style="color: blue">${data.name}</span> 
               <br/>
               ${data.desc}
            </p>
            <div class="infoproduct_properties">
                <ul>
                    <li>
                        <span>Thương hiệu</span>
                        <div class="">${data.trademark}</div>
                    </li>
                    <li>
                        <span>Loại sản phẩm</span>
                        <div class="">${data.trademark}</div>
                    </li>
                    <li>
                        <span>Khối lượng</span>
                        <div class="">560g</div>
                    </li>
                    <li>
                        <span>Nơi sản xuất</span>
                        <div class="">Việt Nam</div>
                    </li>
                    <li>
                        <span>Bảo quản</span>
                        <div class="">Nhiệt độ từ 0-2 độ C</div>
                    </li>
                    <li> 
                        <span>Hạn sử dụng</span>
                        <div class="">${data.createAt}</div></div>
                    </li>
                </ul>
            </div>
            <h6><strong>Ưu điểm của sản phẩm </strong></h6>
            <p>
                ${data.ingredient}
            </p>
            <h6><strong>Cách bảo quản</strong></h6>
            <p>
                Bảo quản thịt bò tái ở nhiệt độ từ 0 - 2 độ C.
            </p>
            <h6><strong>Lưu ý:</strong></h6>
            <span> 
                Sản phẩm nhận được có thể khác với hình ảnh về màu sắc và số lượng nhưng vẫn đảm bảo về mặt khối lượng và chất lượng.
            </span>
        </div>
            `;
      $(`.myInfoProduct`).html(html);
    },
  });
  console.log(1);
  $(".btn-infoproduct-buy").click(function () {});
  //   $(".loading").hide();
});
