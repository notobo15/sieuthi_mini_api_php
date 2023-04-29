function LoadCategory() {
    return new Promise((resolve, reject) => {
        var xml = new XMLHttpRequest();
        xml.open("GET", 'http://localhost/sieuthi_mini_api_php/api/category/list.php', true);
        xml.send();
        xml.onload = function () {
            let categories = JSON.parse(this.responseText);
            var html = ``;
            for (const category of categories) {
                html += ` <tr><td>${category.id}</td>
                <td>${category.name}</td>
                <td>${category.name_code}</td>
                <td>${category.isDeleted}</td>
                <td>
                    <button class="edit" value="${category.id}">Edit</button>
                    <button class="view" value="${category.id}">View</button>
                    <button class="delete" value="${category.id}">Delete</button>
                </td> </tr>`;
            }
            document.querySelector('#category_container .category_table tbody').innerHTML = html;
            resolve();
        }

        xml.onerror = function () {
            console.log("** An error occurred during the load order");
            reject();
        }

        xml.onprogress = (event) => { // triggers periodically
            // event.loaded - how many bytes downloaded
            // event.lengthComputable = true if the server sent Content-Length header
            // event.total - total number of bytes (if lengthComputable)
            console.log(`Received ${event.loaded} of ${event.total}: ${event.lengthComputable}`);
        };
    });
}


function EditCategory() {
    var edits = document.querySelectorAll('#category_container .edit');

    for (const edit of edits) {
        edit.addEventListener('click', () => {

            // ---------------------------- Load form -------------------------------------------------//
            const doc = document.querySelector('.main');
            if (doc.querySelector('#form_popup') !== null) {
                var rm = doc.querySelector('#form_popup');
                doc.removeChild(rm);
            }


            var data = edit.parentNode.parentNode.querySelectorAll('td');
            // console.log(data);
            var html = document.createElement('form');
            html.id = "form_popup";
            html.innerHTML = `
                <div class="close">&times;</div>
                <div class="form_profile" >
                    
                    <div class="form_ele">
                        <label for="id">Id</label>
                        <input type="text" name="id" id="category_id" value="${data[0].textContent}">
                    </div>
                    <div class="form_ele">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="${data[1].textContent}">
                    </div>
                    <div class="form_ele">
                        <label for="name_code">Name_code</label>
                        <input type="text" name="name_code" id="name_code" value="${data[2].textContent}">
                    </div>  
                    <div class="form_footer">
                        <Button class="save" disabled style="pointer-events: none">Save</Button>
                        <Button class="cancel">Cancel</Button>
                    </div> 
                </div>`;

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
            var form_popup = document.querySelector('#form_popup');

            close.addEventListener('click', () => {
                document.querySelector('.main').removeChild(form_popup);
            });

            cancel.addEventListener('click', () => {
                document.querySelector('.main').removeChild(form_popup);
            })

            setTimeout(() => {
                window.addEventListener('click', function RmCart(event) {
                    let form = this.document.querySelector('#form_popup') || null;
                    if (form && (event.target !== form && !form.contains(event.target))) {
                        document.querySelector('.main').removeChild(form);
                        window.removeEventListener('click', RmCart);
                    }
                    else if (form === null) {
                        window.removeEventListener('click', RmCart);
                    }
                })
            }, 100);


            // ---------------------------- save produce profile -------------------------------------------------//
            var form = document.querySelector('#form_popup');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const fd = new FormData(form);
                fetch('http://localhost/sieuthi_mini_api_php/api/category/update.php',
                    {
                        method: 'post',
                        body: fd,
                    }
                )
                    .then(res => res.text())
                    .then(res => console.log(res))
                    .catch(err => console.log(err))
            })

        })
    }
}


function ViewCategory() {
    var views = document.querySelectorAll('#category_container .view');
    for (const view of views) {
        view.addEventListener('click', () => {
            let xml = new XMLHttpRequest();
            xml.open('GET', `http://localhost/sieuthi_mini_api_php/api/category/detail.php?id=${view.value}`)
            xml.send();
            xml.onload = () => {
                let category = JSON.parse(xml.responseText);
                let rows = ``;
                for (const product of category.products) {
                    rows += ` <tr>
                         <td> ${product.id} </td>
                         <td><img src="http://localhost/sieuthi_mini_api_php/images/products/${product.img}" alt=""></td>
                         <td>${product.name}</td>
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


function DeleteCategory() {
    var deletes = document.querySelectorAll('#category_container .delete');
    for (const del of deletes) {
        del.addEventListener('click', () => {
            let row = del.parentNode.parentNode;
            var confirm = window.confirm(`Do you want to delete: ${row.children[1].textContent} ??`);
            if (confirm) {
                row.parentNode.removeChild(row);
                let xml = new XMLHttpRequest();
                xml.open('POST', `http://localhost/sieuthi_mini_api_php/api/category/delete.php`);
                xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xml.send(`id=${del.value}`)
                xml.onload = () => {
                    console.log(xml.response);
                }
            }
        })
    }
}


function SearchCategory() {
    const search = document.querySelector('#category_container .input-group input'),
        table_rows = document.querySelectorAll('.category_table tbody tr');
    // console.log(search.innerHTML);

    search.addEventListener('input', () => {
        table_rows.forEach((row, i) => {
            let table_data = row.textContent.toLowerCase(),
                search_data = search.value.toLowerCase();
            row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
        })
    });
}


function ReLoadCategory() {
    var reload = document.querySelector('#category_container .reload_category')
    reload.addEventListener('click', () => {
        document.querySelector('#category_container .category_table tbody').replaceChildren();
        LoadCategory()
            .then(() => {
                console.log(`Load category table complete`);
                EditCategory();
                ViewCategory();
                DeleteCategory();
                searchTable();
            })
            .catch(() => {
                console.log(`Load category table fail`)
            });
    })
}




//---------------------------- Active functions -------------------------------------//
LoadCategory()
    .then(() => {
        console.log(`Load category table complete`);
        EditCategory();
        ViewCategory();
        DeleteCategory();
        SearchCategory();
    })
    .catch(() => {
        console.log(`Load category table fail`)
    });


ReLoadCategory();