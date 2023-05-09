function LoadProduct() {
  return new Promise((resolve, reject) => {
    var cate;
    var xml = new XMLHttpRequest();
    xml.onload = function () {
      cate = JSON.parse(this.responseText);
      console.log(cate);
    };
    xml.open("GET", `../api/category/list.php`, false);
    xml.send();

    var xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
      var datas = JSON.parse(this.responseText);
      // console.log(JSON.parse (this.responseText)[2].user_id);
      var html = ``;
      datas.forEach((data) => {
        let cate_name =
          cate.find((item) => item.id == data.category_id) || null;
        // console.log(cate_name)
        html += ` <tr>
                <td> ${data.id} </td>
                <td><img src="../images/products/${data.img}" alt=""></td>
                <td>${data.name}</td>
                <td>${cate_name !== null ? cate_name.name : null}</td>
                <td> <p class="status pending">${data.trademark}</p></td>
                <td>
                    <strong>${data.price}/VND </strong>
                </td>
                <td>${data.quantity}</td>
                <td>
                    <button class="product_edit" value="${data.id
          }"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="product_view" value="${data.id
          }"><i class="fa-solid fa-eye"></i></button>
                    <button class="product_delete" value="${data.id
          }"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>`;
      });
      document.querySelector(".product_table table tbody").innerHTML = html;
      resolve();
    };
    xhttp.open("GET", "../api/product/list.php", true);
    xhttp.send();
  });
}

// 1. Searching for specific data of HTML table
function deleteImage(img, id) {
  if (confirm("Bạn có chắc muốn xóa ảnh này?")) {
    let fd = new FormData();
    fd.append("id", id);
    fd.append("name", img);
    $.ajax({
      url: "../api/product/delete_sub_image.php",
      type: "POST",
      processData: false,
      contentType: false,
      data: fd,
      success: function (data) {
        let html_images = "";
        data.images.forEach((item) => {
          html_images += `<p style="position: relative;">
                    <img style="width:100px; padding: 10px" src="../images/products/${item}" id="${item}" alt="" />
                    <span onclick=" return deleteImage('${item}', '${id}')" style="position: absolute; right:0; top:0;">&#10005;</span>
                    </p>`;
        });
        $(".list_images").html(html_images);
      },
    });
  }
}
function addSubImage(id) {
  let fd = new FormData();
  fd.append("file", $("#sub_image")[0].files[0]);
  fd.append("id", id);
  $.ajax({
    url: "../api/product/create_sub_image.php",
    type: "POST",
    processData: false,
    contentType: false,
    data: fd,
    enctype: "multipart/form-data",
    success: function (data) {
      let html_images = "";
      data.images.forEach((item) => {
        html_images += `<p style="position: relative;">
                  <img style="width:100px; padding: 10px" src="../images/products/${item}" id="${item}" alt="" />
                  <span onclick=" return deleteImage('${item}', '${id}')" style="position: absolute; right:0; top:0;">&#10005;</span>
                  </p>`;
      });
      $(".list_images").html(html_images);
    },
    error: function (data) {
      console.log(data);
    },
  });
}

function EditProduct() {
  var edits = document.querySelectorAll(".product_edit");

  edits.forEach((edit) => {
    edit.addEventListener("click", () => {
      // ---------------------------- Load form -------------------------------------------------//
      const doc = document.querySelector(".main");
      if (doc.querySelector("#form_popup") !== null) {
        var rm = doc.querySelector("#form_popup");
        doc.removeChild(rm);
      }

      var xml = new XMLHttpRequest();
      xml.open("GET", `../api/product/detail.php?id=${edit.value}`);
      xml.send();
      xml.onload = async function () {
        var data = JSON.parse(this.responseText);
        // Gọi list discount
        let html_discount = "<option>----Chon-----</option>";
        await $.ajax({
          url: "../api/discount/list.php",
          type: "GET",
          success: function (result) {
            result.forEach((item) => {
              html_discount += `<option value="${item.id}" ${data.price_per == item.price_per ? `selected` : ``
                }>${item.name}</option>`;
            });
          },
        });
        console.log(html_discount);
        //
        var html = await document.createElement("form");
        let html_images = "";
        await data.images.forEach((item) => {
          html_images += `<p style="position: relative;">
                    <img style="width:100px; padding: 10px" src="../images/products/${item}" id="${item}" alt="" />
                    <span onclick=" return deleteImage('${item}', '${data.id}')" style="position: absolute; right:0; top:0;">&#10005;</span>
                    </p>`;
        });
        html.id = "form_popup";
        html.enctype = "multipart/form-data";
        html.innerHTML = `
                <div class="close">&times;</div>
                <div class="form_profile" >
                    <div class="text-center">
                      <img src="../images/products/${data.img}" alt="" id="main-img">
                    </div>
                    <div class="form_ele">
                        <label for="img">Ảnh chính</label>
                        <input type="file" value="${data.img}" name="img" id="img"  />
                    </div>
                    
                    <label for="imgs">Ảnh Phụ</label>
                    <div class="form_ele list_images d-flex flex-wrap bg-white">
                    ${html_images}
                    </div>
                    
                    <div class="form_ele">
                        
                    <div class="d-flex justify-content-center align-items-center">
                    
                    <input type="file" name="sub_image" id="sub_image"/>
                    <button class="btn btn-primary" onclick="return addSubImage('${data.id}')">Thêm vào database</button>
                    </div>

                    </div>


                    <div class="form_ele">
                        <input type="hidden" name="id" id="" value="${data.id}">
                    </div>
                    <div class="form_ele">
                        <label for="name">Tên</label>
                        <input type="text" name="name" id="" value="${data.name}">
                    </div>
                    <div class="form_ele">
                        <label for="desc">Mô Tả</label>
                        <textarea type="text" name="desc" value= "${data.desc}" id="">${data.desc}</textarea>
                    </div>
                    <div class="form_ele">
                        <label for="howToUse">Cách Sử Dụng</label>
                        <textarea type="text" name="howToUse" value= "${data.howToUse}" id="">${data.howToUse}</textarea>
                    </div>
                    <div class="form_ele">
                        <label for="preserve">Bảo Quản</label>
                        <textarea type="text" name="preserve" value= "${data.preserve}" id="">${data.preserve}</textarea>
                    </div>
                    <div class="form_ele">
                        <label for="price">Giá Góc</label>
                        <input type="text" name="price" id="" value="${data.price}">
                    </div>
                    <div class="form_ele">
                        <label for="mass">Trọng Lượng</label>
                        <input type="text" name="mass" id="" value="${data.mass}">
                    </div>
                    <div class="form_ele">
                        <label for="ingredient">Thành Phần</label>
                        <textarea name="ingredient" id="" value= "${data.ingredient}">${data.ingredient}</textarea>
                    </div>
                    <div class="form_ele">
                        <label for="trademark">Trademark</label>
                        <input type="text" name="trademark" id="" value="${data.trademark}">
                    </div>
                   
                    <div class="form_ele">
                        <label for="makeIn">Make In</label>
                        <input type="text" name="makeIn" id="" value="${data.makeIn}">
                    </div>
            
                    <div class="form_ele">
                        <label for="quantity">Số Lượng</label>
                        <input type="number" name="quantity" id="" value="${data.quantity}">
                    </div>
                    <div class="form_ele">
                        <label for="expire_date">Ngày Hết Hạn</label>
                        <input type="datetime-local" name="expiredAt" id="expire_date" value="${data.expiredAt}">
                    </div>
                    <div class="form_ele">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="" >
                            <option value="1">Mì, hủ tiếu, phở gói</option>
                            <option value="4" >Gia Vị - Nguyên Liệu Nấu Ăn</option>
                            <option value="7" >Gạo các loại</option>
                            <option value="10" >Đồ hộp các loại</option>
                            <option value="12">Rau lá</option>    
                            <option value="13">Củ, quả</option>    
                            <option value="14">Trái cây</option>
                            <option value="15">Thịt các loại</option>
                            <option value="16">Cá, hải sản</option>
                            <option value="17">Bia</option>
                            <option value="18">Nước ngọt </option>
                            <option value="19">Bánh Snake</option>
                            <option value="20">Nước giặt</option>
                            <option value="21">Nồi, niêu, xoong, chảo</option>
                        </select>
                    </div>

                    <div class="form_ele">
                        <label for="expire_date">Chon loại giảm giá</label>
                        <select name="discount" id="discount" class="">
                          
                            ${html_discount}
                        </select>
                    </div>
                    <div class="form_footer">
                        <button class="save" disabled style="pointer-events: none" type="submit">Save</button>
                        <Button class="cancel" type="button">Cancel</Button>
                    </div>
                </div>  
                `;

        // ---------------------------- Set selected ---------------------------------------/
        html.querySelector("#category_id").value = data.category_id;

        // ---------------------------- Show form popup ---------------------------------------/
        document.querySelector(".main").appendChild(html);

        await $("#discount").change(function () {
          if (confirm("Bạn đã thay đổi mã giảm giá. Bạn có chắc chắn?")) {
            let fd = new FormData();
            fd.append("discount_id", $("#discount").val());
            fd.append("product_id", data.id);
            $.ajax({
              url: "../api/product/discount/create.php",
              type: "POST",
              processData: false,
              contentType: false,
              data: fd,
              success: function (data) {
                console.log(data);
              },
            });
          }
        });
        // ---------------------------- Disable save button -------------------------------------------------//

        var a = doc.querySelector("#form_popup");
        a.addEventListener("input", () => {
          let save = a.querySelector(".save");
          save.disabled = false;
          save.style.pointerEvents = "auto";
        });

        // ---------------------------- Close produce profile -------------------------------------------------//
        var close = document.querySelector("#form_popup .close");
        var cancel = document.querySelector("#form_popup .cancel");
        var form_profile = document.querySelector("#form_popup");

        close.addEventListener("click", () => {
          document.querySelector(".main").removeChild(form_profile);
        });

        cancel.addEventListener("click", () => {
          document.querySelector(".main").removeChild(form_profile);
        });

        window.addEventListener("click", function RmCart(event) {
          let form_popup = this.document.querySelector("#form_popup") || null;
          if (
            form_popup &&
            event.target !== form_popup &&
            !form_popup.contains(event.target)
          ) {
            document.querySelector(".main").removeChild(form_popup);
            window.removeEventListener("click", RmCart);
          } else if (form_popup === null) {
            window.removeEventListener("click", RmCart);
          }
        });

        // ---------------------------- save produce profile -------------------------------------------------//
        var form = document.querySelector("#form_popup");
        form.addEventListener("submit", (e) => {
          e.preventDefault();
          const fd = new FormData(form);
          fetch("../api/product/update.php", {
            method: "post",
            body: fd,
          })
            .then((res) => res.text())
            .then((res) => {
              console.log(res);
              alert("Đã Cập Nhật thành công");
              // close.click();
            })
            .catch((err) => console.log(err));
        });
        // ---------------------------- update image preview -------------------------------------------------//
        let img = html.querySelector("#img");
        let tartget = html.querySelector("#main-img");
        img.onchange = () => {
          let file = img.files[0];
          let reader = new FileReader();
          reader.readAsDataURL(file);
          reader.onload = function () {
            // can also use "this.result"
            tartget.src = reader.result;
          };
        };
      };
    });
  });
}

function AddProduct() {
  var add = document.querySelector(".add_product_btn");

  add.addEventListener("click", () => {
    // ---------------------------- Load form -------------------------------------------------//
    const doc = document.querySelector(".main");
    if (doc.querySelector("#form_popup") !== null) {
      let rm = doc.querySelector("#form_popup");
      doc.removeChild(rm);
    }

    // console.log(data);
    var html = document.createElement("form");
    html.enctype = "multipart/form-data";
    html.id = "form_popup";
    html.innerHTML = `
             <div class="close">&times;</div>
             <div class="form_profile" >
                 <img src="../images/products/not-found-product.jpg" alt="" id="main-img">
                 <div class="form_ele">
                     <label for="img">Main image</label>
                     <input type="file" name="img" id="img" >
                 </div>
                 <div class="form_ele">
                 <label for="name">Name</label>
                 <input type="text" name="name" id="" value="">
                 </div>
                 <div class="form_ele">
                 <label for="desc">Description</label>
                 <textarea type="text" name="desc" id=""></textarea>
                 </div>
                 <div class="form_ele">
                 <label for="howToUse">HowToUse</label>
                 <textarea type="text" name="howToUse" id=""></textarea>
                 </div>
                 <div class="form_ele">
                     <label for="preserve">Preserve</label>
                     <textarea type="text" name="preserve" id=""></textarea>
                 </div>
                 <div class="form_ele">
                     <label for="price">Price</label>
                     <input type="number" name="price" id="" value="">
                 </div>
                 <div class="form_ele">
                     <label for="mass">Mass</label>
                     <input type="text" name="mass" id="" value="">
                 </div>
                 <div class="form_ele">
                     <label for="ingredient">Ingerdient</label>
                     <textarea name="ingredient" id=""></textarea>
                 </div>
                 <div class="form_ele">
                     <label for="trademark">Trademark</label>
                     <input type="text" name="trademark" id="" value="">
                 </div>
                
                 <div class="form_ele">
                     <label for="makeIn">MakeIn</label>
                     <input type="text" name="makeIn" id="" value="">
                 </div>
         
                 <div class="form_ele">
                     <label for="quantity">Quantity</label>
                     <input type="number" name="quantity" id="" value="">
                 </div>
                 <div class="form_ele">
                     <label for="expiredAt">ExpiredAt</label>
                     <input type="datetime-local" name="expiredAt" id="" value="">
                 </div>
                 <div class="form_ele">
                     <label for="category_id">Category</label>
                     <select name="category_id" id="category_id" class="" >
                         <option value="1">Mì, hủ tiếu, phở gói</option>
                         <option value="4" >Gia Vị - Nguyên Liệu Nấu Ăn</option>
                         <option value="7" >Gạo các loại</option>
                         <option value="10" >Đồ hộp các loại</option>
                         <option value="12">Rau lá</option>    
                         <option value="13">Củ, quả</option>    
                         <option value="14">Trái cây</option>
                         <option value="15">Thịt các loại</option>
                         <option value="16">Cá, hải sản</option>
                         <option value="17">Bia</option>
                         <option value="18">Nước ngọt </option>
                         <option value="19">Bánh Snake</option>
                         <option value="20">Nước giặt</option>
                         <option value="21">Nồi, niêu, xoong, chảo</option>
                     </select>
                 </div>
                 <div class="form_footer">
                     <button class="add" disabled style="pointer-events: none" type="submit">Add</button>
                     <Button class="cancel" type="button">Cancel</Button>
                 </div>
             </div>  
             `;

    // ---------------------------- Show form popup ---------------------------------------/
    document.querySelector(".main").appendChild(html);

    // ---------------------------- Disable save button -------------------------------------------------//

    var a = doc.querySelector("#form_popup");
    a.addEventListener("input", () => {
      let save = a.querySelector(".add");
      save.disabled = false;
      save.style.pointerEvents = "auto";
    });

    // ---------------------------- Close produce profile -------------------------------------------------//
    var close = document.querySelector("#form_popup .close");
    var cancel = document.querySelector("#form_popup .cancel");
    var form_profile = document.querySelector("#form_popup");

    close.addEventListener("click", () => {
      document.querySelector(".main").removeChild(form_profile);
    });

    cancel.addEventListener("click", () => {
      document.querySelector(".main").removeChild(form_profile);
    });

    setTimeout(() => {
      window.addEventListener("click", function RmCart(event) {
        let form_popup = this.document.querySelector("#form_popup") || null;
        if (
          form_popup &&
          event.target !== form_popup &&
          !form_popup.contains(event.target)
        ) {
          document.querySelector(".main").removeChild(form_popup);
          window.removeEventListener("click", RmCart);
        } else if (form_popup === null) {
          window.removeEventListener("click", RmCart);
        }
      });
    }, 100);

    // ---------------------------- save produce profile -------------------------------------------------//
    var form = document.querySelector("#form_popup");
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      const fd = new FormData(form);
      fetch("../api/product/create.php", {
        method: "post",
        body: fd,
      })
        .then((res) => res.text())
        .then((res) => {
          alert("Tạo đã tạo thành công");
          console.log(res);
          close.click();
        })
        .catch((err) => console.log(err));
    });
    // ---------------------------- update image preview -------------------------------------------------//
    let img = html.querySelector("#img");
    let tartget = html.querySelector("#main-img");
    img.onchange = () => {
      let file = img.files[0];
      let reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = function () {
        // can also use "this.result"
        tartget.src = reader.result;
      };
    };
  });
}

function ViewProduct() {
  var views = document.querySelectorAll(".product_view");
  for (const view of views) {
    view.addEventListener("click", () => {
      let xml = new XMLHttpRequest();
      xml.open("GET", `../api/product/detail.php?id=${view.value}`);
      xml.send();
      xml.onload = () => {
        let product = JSON.parse(xml.responseText);
        let rows = ``;
        for (const image of product.images) {
          rows += ` <tr>
                         <td> ${product.id} </td>
                         <td><img src="../images/products/${image}" alt=""></td>
                         <td>${image}</td>
                         <td> ${product.price} </td>
                         <td> <p class="status pending">${product.quantity}</p></td>
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
                                <th>images<span class="icon-arrow">&UpArrow;</span></th>
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
  }
}

function DeleteProduct() {
  var dels = document.querySelectorAll("#product_container .product_delete");
  dels.forEach((del) => {
    del.addEventListener("click", () => {
      var row = del.parentNode.parentNode;
      var confirm = window.confirm(
        `Do you want to delete: ${row.children[2].textContent} ??`
      );
      if (confirm) {
        row.parentNode.removeChild(row);
        let xml = new XMLHttpRequest();
        xml.open("POST", `../api/product/delete.php`);
        xml.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded"
        );
        xml.send(`id=${del.value}`);
        xml.onload = () => {
          console.log(xml.response);
        };
      }
    });
  });
}

function searchProduct() {
  let search = document.querySelector("#product_container .input-group input"),
    table_rows = document.querySelectorAll(".product_table tbody tr");
  // console.log(search.innerHTML);

  search.addEventListener("input", () => {
    table_rows.forEach((row, i) => {
      let table_data = row.textContent.toLowerCase(),
        search_data = search.value.toLowerCase();

      row.classList.toggle("hide", table_data.indexOf(search_data) < 0);
    });
  });
}

function ReLoadProduct() {
  var reload = document.querySelector("#product_container .reload_product_btn");
  reload.addEventListener("click", () => {
    document
      .querySelector("#product_container .product_table tbody")
      .replaceChildren();
    LoadProduct().then(() => {
      EditProduct();
      ViewProduct();
      AddProduct();
      DeleteProduct();
      searchProduct();
      SortByTitle() 
    });
  });
}

function SortByTitle() {
  const table_rows = document.querySelectorAll('#product_container tbody tr'),
    table_headings = document.querySelectorAll('#product_container thead th');
  table_headings.forEach((head, i) => {
    let sort_asc = true;
    head.onclick = () => {
      table_headings.forEach(head => head.classList.remove('active'));
      head.classList.add('active');

      document.querySelectorAll('#product_container td').forEach(td => td.classList.remove('active'));
      table_rows.forEach(row => {
        row.querySelectorAll('#product_container td')[i].classList.add('active');
      })

      head.classList.toggle('asc', sort_asc);
      sort_asc = head.classList.contains('asc') ? false : true;

      sortTable(i, sort_asc);
    }
  })
}


function sortTable(column, sort_asc) {
  const table_rows = document.querySelectorAll('#product_container tbody tr');
  [...table_rows].sort((a, b) => {
      let first_row = a.querySelectorAll('#product_container td')[column].textContent,
          second_row = b.querySelectorAll('#product_container td')[column].textContent;

      return sort_asc ? (first_row < second_row ? 1 : -1) : (first_row < second_row ? -1 : 1);
  })
      .map(sorted_row => document.querySelector('#product_container tbody').appendChild(sorted_row));
}

// -------------------------- Main -----------------------------------//
LoadProduct().then(() => {
  EditProduct();
  ViewProduct();
  AddProduct();
  DeleteProduct();
  searchProduct();
  SortByTitle() 
});

ReLoadProduct();
