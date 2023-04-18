

function LoadProduct() {
    var cate;
    var xml = new XMLHttpRequest();
    xml.onload = function () {
        cate = JSON.parse(this.responseText);
        console.log(cate);
    }
    xml.open("GET", `http://localhost:3000/api/category/list`, false)
    xml.send();

    var xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        var datas = JSON.parse(this.responseText);
        // console.log(JSON.parse (this.responseText)[2].user_id);
        var html = ``;
        datas.forEach(data => {
            var cate_name = cate.find(item => item.category_id === data.cate_id)
            html += ` <tr>
                <td> ${data.product_id} </td>
                <td><img src="http://localhost:3000/img/products/${data.img}" alt=""></td>
                <td>${data.name}</td>
                <td> ${cate_name.name} </td>
                <td> <p class="status pending">${data.trademark}</p></td>
                <td>
                    <strong>${data.price}/VND </strong>
                </td>
                <td>${data.quantity}</td>
                <td>
                    <button class="product_edit" value="${data.product_id}"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="product_delete"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>`;
        });
        document.querySelector('.product_table table tbody').innerHTML = html;

    }
    xhttp.open("GET", "http://localhost:3000/api/product/list", false);
    xhttp.send();


}
LoadProduct();


// 1. Searching for specific data of HTML table

function searchTable() {
    const search = document.querySelector('#product_container .input-group input'),
        table_rows = document.querySelectorAll('.product_table tbody tr');
    // console.log(search.innerHTML);

    search.addEventListener('input', () => {
        table_rows.forEach((row, i) => {
            let table_data = row.textContent.toLowerCase(),
                search_data = search.value.toLowerCase();

            row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
            // row.style.setProperty('--delay', i / 25 + 's');
        })

        // document.querySelectorAll('.product_table tbody tr:not(.hide)').forEach((visible_row, i) => {
        //     visible_row.style.backgroundColor = (i % 2 === 0) ? 'transparent' : '#0000000b';
        // });
    });

}


const table_headings = document.querySelectorAll('.product_table thead th');
const table_rows = document.querySelectorAll('.product_table tbody tr');

table_headings.forEach((head, i) => {
    const table_rows = document.querySelectorAll('.product_table tbody tr');

    let sort_asc = true;
    head.onclick = () => {
        table_headings.forEach(head => head.classList.remove('active'));
        head.classList.add('active');

        document.querySelectorAll('.product_table td').forEach(td => td.classList.remove('active'));
        table_rows.forEach(row => {
            row.querySelectorAll('.product_table td')[i].classList.add('active');
        })

        head.classList.toggle('asc', sort_asc);
        sort_asc = !head.classList.contains('asc');

        sortTable(i, sort_asc);
    }
})

function sortTable(column, sort_asc) {

    [...table_rows].sort((a, b) => {
        let first_row = a.querySelectorAll('.product_table td')[column].textContent.toLowerCase(),
            second_row = b.querySelectorAll('.product_table td')[column].textContent.toLowerCase();

        return sort_asc ? (first_row < second_row ? 1 : -1) : (first_row < second_row ? -1 : 1);
    })
        .map(sorted_row => document.querySelector('.product_table tbody').appendChild(sorted_row));
}

function EditProduct() {
    var edits = document.querySelectorAll('.product_edit');

    edits.forEach(edit => {

        edit.addEventListener('click', () => {
           
            var xml = new XMLHttpRequest();
            xml.onload = function () {
                var data = JSON.parse( this.responseText);
                console.log(data);
                var html = document.createElement('div');
                html.id = "product_profile_popup";
                html.innerHTML = `
                <div class="close">&times;</div>
                <div class="product_profile">
                    <img src="http://localhost:3000/img/products/${data.img }" alt="">
                    <div class="product_ele">
                        <label for="product_id">Id</label>
                        <input type="text" name="product_id" id="" value="${data.product_id}">
                    </div>
                    <div class="product_ele">
                        <label for="product_name">Name</label>
                        <input type="text" name="product_name" id="" value="${data.name}">
                    </div>
                    <div class="product_ele">
                        <label for="product_slug">Slug:</label>
                        <input type="text" name="product_slug" id="" value="${data.slug}">
                    </div>
                    <div class="product_ele">
                        <label for="product_description">Description</label>
                        <textarea name="product_description" id="" >${data.description}</textarea>
                    </div>
                    <div class="product_ele">
                        <label for="product_price">Price</label>
                        <input type="text" name="product_price" id="" value="${data.price}">
                    </div>
                    <div class="product_ele">
                        <label for="product_mass">Mass</label>
                        <input type="text" name="product_mass" id="" value="${data.mass}">
                    </div>
                    <div class="product_ele">
                        <label for="product_ingredient">Ingerdient</label>
                        <textarea name="product_ingredient" id="">${data.ingredient}</textarea>
                    </div>
                    <div class="product_ele">
                        <label for="product_htu">HowToUse</label>
                        <input type="text" name="product_htu" id="" value="${data.how_to_use}">
                    </div>
                    <div class="product_ele">
                        <label for="product_preserve">Preserve</label>
                        <textarea name="product_preserve" id="">${data.preserve}</textarea>
                    </div>
                    <div class="product_ele">
                        <label for="product_trademark">Trademark</label>
                        <input type="text" name="product_trademark" id="" value="${data.trademark}">
                    </div>
                    <div class="product_ele">
                        <label for="product_markin">Markin</label>
                        <input type="text" name="product_markin" id="" value="${data.make_in}">
                    </div>
                    <div class="product_ele">
                        <label for="product_cate">Category</label>
                        <select name="product_cate" id="product_cate" class="" >
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
                            <option value="21">Nồi, niêu, xoong, chảo"</option>
                        </select>
                    </div>
                    <div class="product_footer">
                        <button class="add">Add</button>
                        <button class="save">Save</button>
                        <Button class="cancel">Cancel</Button>
                    </div>
                </div>  
                `;
                var opts = html.querySelectorAll('#product_cate option');
                console.log(opts[2].selected)
                opts.forEach(opt => {
                    if (parseInt(opt.value) == parseInt(data.cate_id)) {
                        opt.selected = true;
                    }
                })
                document.querySelector('.main').appendChild(html);
            }

            xml.open("GET", `http://localhost:3000/api/product/${edit.value}`, false);
            xml.send();
        })
    })
    
}


















// -------------------------- Main -----------------------------------//

searchTable();
EditProduct();