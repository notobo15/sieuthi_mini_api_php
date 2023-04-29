

function LoadProduct() {
    return new Promise((resolve, reject) => {
        var cate;
        var xml = new XMLHttpRequest();
        xml.onload = function () {
            cate = JSON.parse(this.responseText);
            console.log(cate);
        }
        xml.open("GET", `http://localhost/sieuthi_mini_api_php/api/category/list.php`, false)
        xml.send();

        var xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            var datas = JSON.parse(this.responseText);
            // console.log(JSON.parse (this.responseText)[2].user_id);
            var html = ``;
            datas.forEach(data => {
                let cate_name = cate.find(item => item.id == data.category_id) || null;
                // console.log(cate_name)
                html += ` <tr>
                <td> ${data.id} </td>
                <td><img src="http://localhost/sieuthi_mini_api_php/images/products/${data.img}" alt=""></td>
                <td>${data.name}</td>
                <td>${(cate_name !== null) ? cate_name.name : null}</td>
                <td> <p class="status pending">${data.trademark}</p></td>
                <td>
                    <strong>${data.price}/VND </strong>
                </td>
                <td>${data.quantity}</td>
                <td>
                    <button class="product_edit" value="${data.id}"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="product_view" value="${data.id}"><i class="fa-solid fa-eye"></i></button>
                    <button class="product_delete" value="${data.id}"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>`;
            });
            document.querySelector('.product_table table tbody').innerHTML = html;
            resolve();
        }
        xhttp.open("GET", "http://localhost/sieuthi_mini_api_php/api/product/list.php", true);
        xhttp.send();
    });



}



// 1. Searching for specific data of HTML table







function EditProduct() {
    var edits = document.querySelectorAll('.product_edit');

    edits.forEach(edit => {

        edit.addEventListener('click', () => {

            // ---------------------------- Load form -------------------------------------------------//
            const doc = document.querySelector('.main');
            if (doc.querySelector('#form_popup') !== null) {
                var rm = doc.querySelector('#form_popup');
                doc.removeChild(rm);
            }


            var xml = new XMLHttpRequest();
            xml.open("GET", `http://localhost/sieuthi_mini_api_php/api/product/detail.php?id=${edit.value}`);
            xml.send();
            xml.onload = function () {
                var data = JSON.parse(this.responseText);
                // console.log(data);
                var html = document.createElement('form');
                html.id = "form_popup";
                html.enctype = "multipart/form-data";
                html.innerHTML = `
                <div class="close">&times;</div>
                <div class="form_profile" >
                    <img src="http://localhost/sieuthi_mini_api_php/images/products/${data.img}" alt="" id="main-img">
                    <div class="form_ele">
                        <label for="img">Main image</label>
                        <input type="file" name="img" id="img" >
                    </div>
                    <div class="form_ele">
                        <label for="imgs">Sub images</label>
                        <input type="file" name="imgs" id="img">
                    </div>
                    <div class="form_ele">
                        <label for="id">Id</label>
                        <input type="text" name="id" id="" value="${data.id}">
                    </div>
                    <div class="form_ele">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="" value="${data.name}">
                    </div>
                    <div class="form_ele">
                        <label for="desc">Description</label>
                        <textarea type="text" name="desc" id="">${data.desc}</textarea>
                    </div>
                    <div class="form_ele">
                        <label for="howToUse">HowToUse</label>
                        <textarea type="text" name="howToUse" id="">${data.howToUse}</textarea>
                    </div>
                    <div class="form_ele">
                        <label for="preserve">Preserve</label>
                        <textarea type="text" name="preserve" id="">${data.preserve}</textarea>
                    </div>
                    <div class="form_ele">
                        <label for="price">Price</label>
                        <input type="text" name="price" id="" value="${data.price}">
                    </div>
                    <div class="form_ele">
                        <label for="discountedPrice">discountedPrice</label>
                        <input type="text" name="discountedPrice" id="" value="${data.discountedPrice}">
                    </div>
                    <div class="form_ele">
                        <label for="price_per">price_per</label>
                        <input type="text" name="price_per" id="" value="${data.price_per}">
                    </div>
                    <div class="form_ele">
                        <label for="mass">Mass</label>
                        <input type="text" name="mass" id="" value="${data.mass}">
                    </div>
                    <div class="form_ele">
                        <label for="ingredient">Ingerdient</label>
                        <textarea name="ingredient" id="">${data.ingredient}</textarea>
                    </div>
                    <div class="form_ele">
                        <label for="trademark">Trademark</label>
                        <input type="text" name="trademark" id="" value="${data.trademark}">
                    </div>
                   
                    <div class="form_ele">
                        <label for="makeIn">MakeIn</label>
                        <input type="text" name="makeIn" id="" value="${data.makeIn}">
                    </div>
            
                    <div class="form_ele">
                        <label for="quantity">Quantity</label>
                        <input type="text" name="quantity" id="" value="${data.quantity}">
                    </div>
                    <div class="form_ele">
                        <label for="expiredAt">ExpiredAt</label>
                        <input type="text" name="expiredAt" id="" value="${data.expiredAt}">
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
                        <button class="save" disabled style="pointer-events: none" type="submit">Save</button>
                        <Button class="cancel">Cancel</Button>
                    </div>
                </div>  
                `;
                // ---------------------------- Set selected ---------------------------------------/
                html.querySelector('#category_id').value = data.category_id;

                // ---------------------------- Show form popup ---------------------------------------/
                document.querySelector('.main').appendChild(html);

                // ---------------------------- Disable save button -------------------------------------------------//

                var a = doc.querySelector('#form_popup');
                a.addEventListener('input', () => {
                    let save = a.querySelector('.save');
                    save.disabled = false;
                    save.style.pointerEvents = 'auto';
                })

                // ---------------------------- Close produce profile -------------------------------------------------//
                var close = document.querySelector('#form_popup .close');
                var cancel = document.querySelector('#form_popup .cancel');
                var form_profile = document.querySelector('#form_popup');

                close.addEventListener('click', () => {
                    document.querySelector('.main').removeChild(form_profile);
                });

                cancel.addEventListener('click', () => {
                    document.querySelector('.main').removeChild(form_profile);
                })

                window.addEventListener('click', function RmCart(event) {
                    let form_popup = this.document.querySelector('#form_popup') || null;
                    if (form_popup && (event.target !== form_popup && !form_popup.contains(event.target))) {
                        document.querySelector('.main').removeChild(form_popup);
                        window.removeEventListener('click', RmCart);
                    }
                    else if (form_popup === null) {
                        window.removeEventListener('click', RmCart);
                    }
                })


                // ---------------------------- save produce profile -------------------------------------------------//
                var form = document.querySelector('#form_popup');
                form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    const fd = new FormData(form);
                    fetch('http://localhost/sieuthi_mini_api_php/api/product/update.php',
                        {
                            method: 'post',
                            body: fd,
                        }
                    )
                        .then(res => res.text())
                        .then(res => console.log(res))
                        .catch(err => console.log(err))
                })
                // ---------------------------- update image preview -------------------------------------------------//
                let img = html.querySelector('#img');
                let tartget = html.querySelector('#main-img')
                img.onchange = () => {
                    let file = img.files[0];
                    let reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        // can also use "this.result"
                        tartget.src = reader.result;
                    }
                }

            }
        })
    })
}

function AddProduct() {
    var add = document.querySelector('.add_product_btn');

    add.addEventListener('click', () => {
        // ---------------------------- Load form -------------------------------------------------//
        const doc = document.querySelector('.main');
        if (doc.querySelector('#form_popup') !== null) {
            let rm = doc.querySelector('#form_popup');
            doc.removeChild(rm);
        }


        // console.log(data);
        var html = document.createElement('form');
        html.enctype = "multipart/form-data"
        html.id = "form_popup";
        html.innerHTML = `
             <div class="close">&times;</div>
             <div class="form_profile" >
                 <img src="http://localhost/sieuthi_mini_api_php/images/not-found-product.jpg" alt="" id="main-img">
                 <div class="form_ele">
                     <label for="img">Main image</label>
                     <input type="file" name="img" id="img" >
                 </div>
                 <div class="form_ele">
                     <label for="imgs">Sub images</label>
                     <input type="file" name="imgs" id="img">
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
                     <input type="text" name="price" id="" value="">
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
                     <input type="text" name="quantity" id="" value="">
                 </div>
                 <div class="form_ele">
                     <label for="expiredAt">ExpiredAt</label>
                     <input type="text" name="expiredAt" id="" value="">
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
                     <Button class="cancel">Cancel</Button>
                 </div>
             </div>  
             `;

        // ---------------------------- Show form popup ---------------------------------------/
        document.querySelector('.main').appendChild(html);

        // ---------------------------- Disable save button -------------------------------------------------//

        var a = doc.querySelector('#form_popup');
        a.addEventListener('input', () => {
            let save = a.querySelector('.add');
            save.disabled = false;
            save.style.pointerEvents = 'auto';
        })

        // ---------------------------- Close produce profile -------------------------------------------------//
        var close = document.querySelector('#form_popup .close');
        var cancel = document.querySelector('#form_popup .cancel');
        var form_profile = document.querySelector('#form_popup');

        close.addEventListener('click', () => {
            document.querySelector('.main').removeChild(form_profile);
        });

        cancel.addEventListener('click', () => {
            document.querySelector('.main').removeChild(form_profile);
        })

        setTimeout(() => {
            window.addEventListener('click', function RmCart(event) {
                let form_popup = this.document.querySelector('#form_popup') || null;
                if (form_popup && (event.target !== form_popup && !form_popup.contains(event.target))) {
                    document.querySelector('.main').removeChild(form_popup);
                    window.removeEventListener('click', RmCart);
                }
                else if (form_popup === null) {
                    window.removeEventListener('click', RmCart);
                }
            })
        }, 100);

        // ---------------------------- save produce profile -------------------------------------------------//
        var form = document.querySelector('#form_popup');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const fd = new FormData(form);
            fetch('http://localhost/sieuthi_mini_api_php/api/product/create.php',
                {
                    method: 'post',
                    body: fd,
                }
            )
                .then(res => res.text())
                .then(res => console.log(res))
                .catch(err => console.log(err))
        })
        // ---------------------------- update image preview -------------------------------------------------//
        let img = html.querySelector('#img');
        let tartget = html.querySelector('#main-img')
        img.onchange = () => {
            let file = img.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                // can also use "this.result"
                tartget.src = reader.result;
            }
        }
    })
}


function ViewProduct() {
    var views = document.querySelectorAll('.product_view');
    for (const view of views) {
        view.addEventListener('click', () => {
            let xml = new XMLHttpRequest();
            xml.open('GET', `http://localhost/sieuthi_mini_api_php/api/product/detail.php?id=${view.value}`)
            xml.send();
            xml.onload = () => {
                let product = JSON.parse(xml.responseText);
                let rows = ``;
                for (const image of product.images) {
                    rows += ` <tr>
                         <td> ${product.id} </td>
                         <td><img src="http://localhost/sieuthi_mini_api_php/images/products/${image}" alt=""></td>
                         <td>${image}</td>
                         <td> ${product.price} </td>
                         <td> <p class="status pending">${product.quantity}</p></td>
                     </tr>`
                }

                let html = document.createElement('section');
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
                document.querySelector('.main').appendChild(html);

                // ----------------------------------- Close cart ----------------------------------- //
                let close = document.querySelector('#cart .cart_header .close')
                close.onclick = () => { document.querySelector('.main').removeChild(close.parentNode.parentNode) };

                window.addEventListener('click', function RmCart(event) {
                    let cart = this.document.querySelector('#cart') || null;
                    if (cart && (event.target !== cart && !cart.contains(event.target))) {
                        document.querySelector('.main').removeChild(cart);
                        window.removeEventListener('click', RmCart);
                    }
                    else if (cart === null) {
                        window.removeEventListener('click', RmCart);
                    }
                })
            }
        })
    }
}

function DeleteProduct() {
    var dels = document.querySelectorAll('#product_container .product_delete');
    dels.forEach(del => {
        del.addEventListener('click', () => {
            var row = del.parentNode.parentNode;
            var confirm = window.confirm(`Do you want to delete: ${row.children[2].textContent} ??`);
            if (confirm) {
                row.parentNode.removeChild(row);
                let xml = new XMLHttpRequest();
                xml.open('POST', `http://localhost/sieuthi_mini_api_php/api/product/delete.php`);
                xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xml.send(`id=${del.value}`)
                xml.onload = () => {
                    console.log(xml.response);
                }
            }

        })
    })
}


function searchProduct() {
    let search = document.querySelector('#product_container .input-group input'),
        table_rows = document.querySelectorAll('.product_table tbody tr');
    // console.log(search.innerHTML);

    search.addEventListener('input', () => {
        table_rows.forEach((row, i) => {
            let table_data = row.textContent.toLowerCase(),
                search_data = search.value.toLowerCase();

            row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
        })
    });
}


function ReLoadProduct() {
    var reload = document.querySelector('#product_container .reload_product_btn')
    reload.addEventListener('click', () => {
        document.querySelector('#product_container .product_table tbody').replaceChildren();
        LoadProduct()
            .then(() => {

                EditProduct();
                ViewProduct();
                AddProduct();
                DeleteProduct();
                searchProduct();
            })
    })
}


// -------------------------- Main -----------------------------------//
LoadProduct()
    .then(() => {

        EditProduct();
        ViewProduct();
        AddProduct();
        DeleteProduct();
        searchProduct();
    })

ReLoadProduct();