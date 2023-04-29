


// ------------------------ Load user table ------------------------ //

function LoadAccount() {
    return new Promise(resolve => {
        var xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            var datas = JSON.parse(this.responseText);
            // console.log(JSON.parse (this.responseText)[2].user_id);

            var html = ``;
            datas.forEach(data => {
                html += `<tr><td>${data.id}</td>
                    <td>${data.account_id}</td>
                    <td>${data.first_name + data.last_name}</td>
                    <td>${data.phone}</td>
                    <td>${data.delivery_address}</td>
                    <td>${data.gender}</td>
                    <td>${data.group_id}</td>
                    <td class="user_setting">
                            <button class="user_edit" value="${data.id}"><i class="fa-solid fa-hammer"></i></button>
                            <button class="user_delete" value="${data.id}"><i class="fa-solid fa-trash"></i></button>
                    </td>
                    </tr>`
            });

            document.querySelector('#user_table table tbody').innerHTML = html;
            resolve();
        }
        xhttp.open("GET", `http://localhost/sieuthi_mini_api_php/api/accounts/list.php`, true);
        xhttp.send();
    })

}


// ------------------------ Edit user information ------------------------ //

function EditAccount() {
    var edits = document.querySelectorAll('#user_container .user_edit');

    for (const edit of edits) {
        edit.addEventListener('click', () => {

            // -------------------------------- Get all group id (permission) -----------------------------//
            // var groups;
            // let xhr = new XMLHttpRequest();
            // xhr.open("GET", `http://localhost/sieuthi_mini_api_php/api/groups/list.php`,false);
            // xhr.send();
            // xhr.onload = () => {
            //     groups = JSON.parse(xhr.responseText);
            // }
            // var opts = ``;
            // for (const group of groups) {
            //     opts += ` <option value="${group.id}">${group.name}</option>`
            // }
            // <div class="form_ele">
            //             <label for="group_id">Role</label>
            //             <select name="group_id" id="group_id" class="" > 
            //                 ${opts}
            //             </select>
            // </div>

            // -------------------------------- Show form pop up -----------------------------//
            const doc = document.querySelector('.main');
            if (doc.querySelector('#form_popup') !== null) {
                var rm = doc.querySelector('#form_popup');
                doc.removeChild(rm);
            }

            let xml = new XMLHttpRequest();
            xml.open("GET", `http://localhost/sieuthi_mini_api_php/api/accounts/detail.php?id=${edit.value}`);
            xml.send();
            xml.onload = function () {
                var data = JSON.parse(this.responseText);
                // console.log(data);
                var html = document.createElement('form');
                html.id = "form_popup";
                html.innerHTML = `
                <div class="close">&times;</div>
                <div class="form_profile">
                    <div class="form_ele">
                        <label for="id">Id</label>
                        <input type="text" name="id" id="" value="${data.id}">
                    </div>
                    <div class="form_ele">
                        <label for="first_name">first_name</label>
                        <input type="text" name="first_name" id="" value="${data.first_name}">
                    </div>
                    <div class="form_ele">
                        <label for="last_name">last_name</label>
                        <input type="text" name="last_name" id="" value="${data.last_name}">
                    </div>
                    <div class="form_ele">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="" value="${data.phone}">
                    </div>
                    <div class="form_ele">
                        <label for="birth_date">birth_date</label>
                        <input type="text" name="birth_date" id="" value="${data.birth_date}">
                    </div>
                    <div class="form_ele">
                        <label for="delivery_address">delivery_address</label>
                        <input type="text" name="delivery_address" id="" value="${data.delivery_address}">
                    </div>
                    <div class="form_ele">
                        <label for="gender">gender</label>
                        <input type="text" name="gender" id="" value="${data.gender}">
                    </div>
                    
                    <div class="form_footer">
                        <button class="save" disabled style="pointer-events: none" type="submit">Save</button>
                        <Button class="cancel">Cancel</Button>
                    </div>
                </div>  
                `;
                // ---------------------------- Set selected role ---------------------------------------/
                // html.querySelector('#group_id').value = data.group_id;

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
            }

        })
    }
}
// ------------------------ Delete user ------------------------ //


function DeleteAccount() {
    var deletes = document.querySelectorAll('#user_container .user_delete');
    for (const del of deletes) {
        del.addEventListener('click', () => {
            let row = del.parentNode.parentNode;
            var confirm = window.confirm(`Do you want to delete: ${row.children[1].textContent} ??`);
            if (confirm) {
                row.parentNode.removeChild(row);
                let xml = new XMLHttpRequest();
                xml.open('GET', `http://localhost/sieuthi_mini_api_php/api/accounts/delete.php?id=${del.value}`);
                xml.send()
                xml.onload = () => {
                    console.log(xml.response);
                }
            }
        })
    }
}


// ------------------------ Search user ------------------------ //

function SearchAccount() {
    var users = document.querySelectorAll('#user_table table tbody tr'),
        search_user = document.getElementById('search_user');

    search_user.addEventListener('input', () => {
        console.log(search_user.innerHTML);
        users.forEach((row) => {
            let table_data = row.textContent.toLowerCase(),
                search_data = search_user.value.toLowerCase();

            row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
        })
    })
}




// ------------------------ Active Function -------------------------------

LoadAccount()
    .then(() => {
        EditAccount()
        SearchAccount();
        DeleteAccount();
    })


function ReloadAccount() {
    let reload = document.querySelector('#user_container .user_reload')
    reload.addEventListener('click', () => {
        LoadAccount()
            .then(() => {
                EditAccount()
                search();
                DeleteAccount();
            });
    })
}
ReloadAccount();
