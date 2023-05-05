function addProductToCart(id, price) {
  let fd = new FormData();
  fd.append("product_id", id);
  fd.append("quantity", 1);
  fd.append("price", price);
  $.ajax({
    type: "post",
    url: "api/accounts/cart/create.php",
    processData: false,
    contentType: false,
    data: fd,
    success: function (data) {
      console.log(data);
      window.history.back();
    },
  });
}
$(document).ready(async function () {
  let url = new URL(location.href);
  let id = url.searchParams.get("id");
  await $.ajax({
    type: "GET",
    url: `./api/product/detail.php?id=${id}`,
    success: function (data) {
      console.log(data);
      data.images = [data.img, ...data.images];
      let html = " ";
      html = `<div class="myInfoProduct_Header">
      <h4> <a href="index.php">Trang chủ</a> <span> > </span> <span href="#">${
        data.category_name
      }</span></h4>
          </div>
          <div class="row pt-4">
              <div class="col-lg-7 col-md-12 infoProduc_img">
                  <div class="mySlider_infoProduct w-50 h-50" style="margin-bottom: 70px;">
                          <div id="carouselExampleIndicators" class="carousel slide" data-bs-interval="false">
                            <div class="parent-carousel-indicators">
                                  <div class="carousel-indicators">
                                  <!-- <img src="./images/products/${
                                    data.img
                                  }" alt=""
                                      data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active list-img-slider"
                                      aria-current="true" aria-label="Slide 1">
                                    <img src="./img/product/MÌ ăn liền/thung-24-ly-mi-modern-lau-thai-tom-65g-202205171454334430_300x300.jpg" alt=""
                                      data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2" class="list-img-slider">
                                    <img
                                      src="./img/product/nc giặt/nuoc-giat-ariel-chuyen-gia-cua-tren-huong-downy-nuoc-hoa-tui-38-lit-202303061116362252_300x300.jpg"
                                      alt="" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"
                                      class="list-img-slider">
                                    <img src="./img/product/combo-thit-nuong-han-quoc-thao-tien-foods-hop-560g-202212141418408307_300x300.png"
                                      alt="" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"
                                      class="list-img-slider">
                                    <img src="./img/product/mi-kho-ga-cay-samyang-goi-140g-202302271042338764.png" alt=""
                                      data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5" class="list-img-slider">
                                    <img
                                      src="./img/product/nc-Mắm/nuoc-mam-ca-com-dac-san-hung-thinh-40-do-dam-chai-750ml-202210011034362058_300x300.jpg"
                                      alt="" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"
                                      class="list-img-slider"> -->
                                       
                                  </div>
                                
                            </div>

                                <div id="btn-prev-3"  data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon icon-prev-3"></span>
                                </div>
                      
                                <div  id="btn-next-3"  data-bs-target="#carouselExampleIndicators" 
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon icon-next-3" ></span>
                                </div>
                            
                        
                            <div class="carousel-inner">
                            <!-- <div class="carousel-item active">
                                <img src="./images/products/${
                                  data.img
                                }" class="d-block w-100" alt="...">
                              </div> --> 
                            </div>
                            <button class="carousel-control-prev" id="btn-prev-2" type="button" data-bs-target="#carouselExampleIndicators"
                              data-bs-slide="prev">
                              <span class="carousel-control-prev-icon icon-prev-2" aria-hidden="true"></span>
                              <span class="visually-hidden ">Previous</span>
                            </button>
                            <button class="carousel-control-next" id="btn-next-2" type="button" data-bs-target="#carouselExampleIndicators"
                              data-bs-slide="next">
                              <span class="carousel-control-next-icon icon-next-2" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                        </div>
                        <div class="modal_info_img">
                          <div class="modal_overlay_info_img">
                          </div>
                          <div class="modal_body_info_img">
                            <span id="click-close-info-img"><i class="fa-solid fa-x"></i></span>
                            <img src="" alt="">
                          </div>
                        </div>
              </div>
              <div class="col-lg-5 col-md-12">
                  <h3> ${data.name} </h3>
                  <p>HSD còn 1 năm</p>
                
                  <div class="Infoproduct_price">
                  ${
                    data.discountedPrice == null
                      ? `<h3><strong class="text-danger">${priceToVND(
                          data.price
                        )}</strong></h3>`
                      : `
                          <h3><strong class="text-danger">${priceToVND(
                            data.discountedPrice
                          )}</strong></h3>
                          <p class="text-decoration-line-through text-danger mx-1">${priceToVND(
                            data.price
                          )}</p>
                          <div class = "post-tag">${data.price_per}%</div>
                        `
                  }

                  </div>
                  <button class="btn btn-danger mt-2 bg-danger btn-infoproduct-buy" onClick="return addProductToCart(${
                    data.id
                  }, ${
        data.discountedPrice == null ? data.price : data.discountedPrice
      })">CHỌN MUA</button>
              </div>
          </div>
          <div class="information_product">
              <div class="infoto">
                  <h6>Thông tin sản phẩm</h6>
                  <div class="infotoColor"></div>
              </div>
              <p>
                  <span style="color: blue">${data.name}</span>
                  <br />
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
                          <div class="">${data.createAt}</div>
              </div>
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
              Sản phẩm nhận được có thể khác với hình ảnh về màu sắc và số lượng nhưng vẫn đảm bảo về mặt khối lượng và chất
              lượng.
          </span>
          </div>`;
      // add img slider
      $(`.myInfoProduct`).html(html);
      data.images.forEach(function (item, index) {
        let html = " ";
        if (index == 0) {
          html = `
            <img src="./images/products/${item}" alt=""
            data-bs-target="#carouselExampleIndicators" data-bs-slide-to="${index}"  class="active list-img-slider"
            aria-current="true" aria-label="Slide ${index + 1}">
            `;
        }
        if (index > 0) {
          html = `
          <img src="./images/products/${item}" alt=""
          data-bs-target="#carouselExampleIndicators" data-bs-slide-to="${index}"  aria-label="Slide ${
            index + 1
          }" class="list-img-slider">
          `;
        }
        $(".carousel-indicators").append(html);
      });
      // add slider img and click infoimg
      const sliderimg = document.querySelectorAll(`.carousel-indicators img`);
      // console.log(sliderimg.length);
      sliderimg.forEach(function (item, index) {
        //  console.log(item);
        let srcImg = $(item).attr("src");
        let html = "";
        // console.log(index);
        if (index == 0) {
          html = `
            <div class="carousel-item active">
            <img src="${srcImg}" class="d-block w-100" alt="...">
            </div>
            `;
        }
        if (index > 0) {
          html = `
           <div class="carousel-item">
           <img src="${srcImg}" class="d-block w-100" alt="...">
           </div>
           `;
        }
        $(".carousel-inner").append(html);
      });
      // click chuyen slider anh
      $(".carousel-control-next").click((item) => {
        sliderimg.forEach(function (item_img, index) {
          let activeimg = item_img.classList.contains("active");
          if (activeimg) {
            if (index > 5) {
              let carouselitem = document.querySelector(".carousel-indicators");
              carouselitem.classList.add(`ativeimg${index}`);
              carouselitem.classList.remove("removeativeimg");
            }
            if (index == 0) {
              console.log(342342432);
              let carouselitem = document.querySelector(".carousel-indicators");
              carouselitem.classList.add("removeativeimg");
              carouselitem.classList.remove("ativeimg6");
              carouselitem.classList.remove("ativeimg7");
              carouselitem.classList.remove("ativeimg8");
              carouselitem.classList.remove("ativeimg9");
            }
          }
        });
      });
      $(".carousel-control-prev").click((item) => {
        sliderimg.forEach(function (item_img, index) {
          let activeimg = item_img.classList.contains("active");
          if (activeimg) {
            if (index == sliderimg.length - 1) {
              console.log(23432142);
              let carouselitem = document.querySelector(".carousel-indicators");
              carouselitem.classList.add(`ativeimg${index}`);
              carouselitem.classList.remove("removeativeimg");
            }
            if (index > 6 && index < sliderimg.length - 1) {
              let carouselitem = document.querySelector(".carousel-indicators");
              carouselitem.classList.add(`ativeimg${index}`);
              carouselitem.classList.remove("removeativeimg");
            }
            if (index == 5) {
              let carouselitem = document.querySelector(".carousel-indicators");
              carouselitem.classList.add("removeativeimg");
              carouselitem.classList.remove("ativeimg6");
              carouselitem.classList.remove("ativeimg7");
              carouselitem.classList.remove("ativeimg8");
              carouselitem.classList.remove("ativeimg9");
            }
          }
        });
      });
      //  click on list
      $(".icon-next-3").click((item) => {
        sliderimg.forEach(function (item_img, index) {
          let activeimg = item_img.classList.contains("active");
          if (activeimg) {
            if (index > 5) {
              let carouselitem = document.querySelector(".carousel-indicators");
              carouselitem.classList.add(`ativeimg${index}`);
              carouselitem.classList.remove("removeativeimg");
            }
            if (index == 0) {
              console.log(342342432);
              let carouselitem = document.querySelector(".carousel-indicators");
              carouselitem.classList.add("removeativeimg");
              carouselitem.classList.remove("ativeimg6");
              carouselitem.classList.remove("ativeimg7");
              carouselitem.classList.remove("ativeimg8");
              carouselitem.classList.remove("ativeimg9");
            }
          }
        });
      });
      $(".icon-prev-3").click((item) => {
        sliderimg.forEach(function (item_img, index) {
          let activeimg = item_img.classList.contains("active");
          if (activeimg) {
            if (index == sliderimg.length - 1) {
              console.log(23432142);
              let carouselitem = document.querySelector(".carousel-indicators");
              carouselitem.classList.add(`ativeimg${index}`);
              carouselitem.classList.remove("removeativeimg");
            }
            if (index > 6 && index < sliderimg.length - 1) {
              let carouselitem = document.querySelector(".carousel-indicators");
              carouselitem.classList.add(`ativeimg${index}`);
              carouselitem.classList.remove("removeativeimg");
            }
            if (index == 5) {
              let carouselitem = document.querySelector(".carousel-indicators");
              carouselitem.classList.add("removeativeimg");
              carouselitem.classList.remove("ativeimg6");
              carouselitem.classList.remove("ativeimg7");
              carouselitem.classList.remove("ativeimg8");
              carouselitem.classList.remove("ativeimg9");
            }
          }
        });
      });
      //  click xem ảnh
      const closeImg = document.querySelector(`.modal_info_img`);
      $(`.carousel-item`).click(function () {
        let imgElement = $(this).children("img").attr("src");
        $(`.modal_body_info_img`).children("img").attr("src", imgElement);
        closeImg.style.display = "block";
      });
      // click tắt ảnh
      $(`#click-close-info-img`).click(function () {
        closeImg.style.display = `none`;
      });
    },
  });

  await hideLoading();
});
