
// ------------------------ Global ----------------------------//

var user_length;

// ------------------------ Load user table ------------------------ //

function LoadUser() {
    // let url = new URL(location.href);

    // $.ajax({
    //     type: "GET",
    //     url: `http://localhost:3000/api/user/list`,
    //     success: function (datas) {
    //         var html;
    //         html = ``;
    //         datas.forEach(data => {
    //             html += `<tr><td>${data.user_id}</td>
    //             <td>${data.user_name}</td>
    //             <td>${data.first_name + data.last_name}</td>
    //             <td>${data.phone}</td>
    //             <td>${data.birth_timestamp}</td>
    //             <td>${data.address}</td>
    //             <td>${data.gender === m 'nam' ? 'male' : 'female'}</td>
    //             <td>${data.group_id == '1' ? 'admin' : 'user'}</td>

    //             <td>
    //                 <p class="user_status ${data.group_id == '1' ? 'online' : 'offline'}">
    //                 ${data.group_id == '1' ? 'online' : 'offline'}</p>
    //             </td>
    //             <td class="user_setting"><i class="fa-solid fa-gear"></i>
    //                 <span class="user_setting_content">
    //                     <button class="user_edit">edit</button>
    //                     <button class="user_view">view</button>
    //                     <button class="user_delete">delete</button>

    //                 </span>
    //             </td></tr>`
    //         });

    //         document.querySelector('#user_table table tbody').innerHTML = html;

    //     }

    // })

    var xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        var datas = JSON.parse(this.responseText);
        // console.log(JSON.parse (this.responseText)[2].user_id);
        user_length = datas.length
        var html = ``;
        datas.forEach(data => {
            // var cateid;
            // var xml = new XMLHttpRequest();
            // xml.onload() = () => {
            //     cateid = JSON.parse(this.responseText);
            // }
            // xml.send("GET", `http://localhost:3000/api/user/list`, false)


            html += `<tr><td>${data.user_id}</td>
                <td>${data.user_name}</td>
                <td>${data.first_name + data.last_name}</td>
                <td>${data.phone}</td>
                <td>${data.birth_timestamp}</td>
                <td>${data.address}</td>
                <td>${data.gender === 'nam' ? 'male' : 'female'}</td>
                <td>${data.group_id == '1' ? 'admin' : 'user'}</td>

                <td>
                    <p class="user_status ${data.group_id == '1' ? 'online' : 'offline'}">
                    ${data.group_id == '1' ? 'online' : 'offline'}</p>
                </td>
                <td class="user_setting">
                        <button class="user_edit"><i class="fa-solid fa-hammer"></i></button>
                        <button class="user_view"><i class="fa-solid fa-eye"></i></button>
                        <button class="user_delete"><i class="fa-solid fa-trash"></i></button>
                </td>
                </tr>`
        });

        document.querySelector('#user_table table tbody').innerHTML = html;
    }
    xhttp.open("GET", `http://localhost:3000/api/user/list`, false);
    xhttp.send();
}

// ------------------------ Add user  ------------------------ //

function AddUser() {
    var add = document.querySelector('#user_header .user_add');
    var user_profile = document.getElementById('user_profile');
    var user_data = document.querySelectorAll('#user_profile div:not(:last-child)');
    var profile_save = document.querySelector('#user_profile .save');
    var profile_add = document.querySelector('#user_profile .add');
    var users = document.querySelectorAll('#user_table table tbody tr');
    var user_data = document.querySelectorAll('#user_profile div:not(:last-child)');

    add.onclick = () => {

        user_data.forEach(item => {
            item.children[0].value = '';
            if (item.children[0].disabled === true) {
                item.children[0].disabled = false;
            }
        })

        profile_add.style.display = 'block';
        profile_save.style.display = 'none';
        user_profile.style.display = 'flex';
    }

    profile_add.onclick = () => {
        let bool = false;
        var data = {};
        for (var i = 0; i < user_data.length; ++i) {
            data[`${user_data[i].children[0].name}`] = user_data[i].children[0].value;
        }

        users.forEach(user => {
            if (parseInt(user.children[0].textContent) === parseInt(data.id)) {
                bool = true;
            }
        })

        if (bool || data.id === '') {
            window.alert("Id đã tồn tại hoặc id không được rỗng");
            return;
        }

        let html = document.createElement('tr');
        html.innerHTML = `<td>${data.id}</td>
        <td>${data.account}</td>
        <td>${data.name}</td>
        <td>${data.phone}</td>
        <td>${data.birth_date}</td>
        <td>${data.address}</td>
        <td>${data.sex}</td>
        <td>${data.role}</td>

        <td>
            <p class="user_status ${data.status}">
            ${data.status}</p>
        </td>
        <td class="user_setting">
                <button class="user_edit"><i class="fa-solid fa-hammer"></i></button>
                <button class="user_view"><i class="fa-solid fa-eye"></i></button>
                <button class="user_delete"><i class="fa-solid fa-trash"></i></button>
        </td>
        `;

        document.querySelector('#user_table table tbody').appendChild(html);
        user_profile.style.display = 'none';
    }
}

// ------------------------ Close user information ------------------------ //


function CloseUserInfo() {
    var profile_close = document.querySelector('#user_profile .user_profile_btnclose');
    var profile_cancel = document.querySelector('#user_profile .cancel');

    profile_close.onclick = () => {
        user_profile.style.display = 'none';
    }

    profile_cancel.onclick = () => {
        user_profile.style.display = 'none';
    }
}

// ------------------------ Edit user information ------------------------ //


function EditUserInfo() {
    var user_edit_btn = document.querySelectorAll('.user_setting .user_edit');
    var user_profile = document.getElementById('user_profile');
    var user_data = document.querySelectorAll('#user_profile div:not(:last-child)');
    var profile_save = document.querySelector('#user_profile .save');
    var profile_add = document.querySelector('#user_profile .add');
    
    var row;
    // console.log(users.rows)
    // console.log(users.rows[1].cells.length);

    user_edit_btn.forEach((item, index) => {
        item.addEventListener("click", () => {
            profile_save.style.display = 'block';
            profile_add.style.display = 'none';

            user_profile.style.display = 'flex'
            row = item.parentNode.parentNode;

            for (var i = 0; i < row.cells.length - 1; ++i) {
                user_data[i].children[0].value = row.cells[i].textContent.trim();
                user_data[i].children[0].disabled = false;
            }
        })
    });

    profile_save.onclick = () => {
        // console.log(user_data[i].textContent);
        for (var i = 0; i < row.cells.length - 1; ++i) {

            if (i === 8) {
                let status = user_data[i].children[0].value;
                row.cells[i].innerHTML = `<p class='user_status ${status}'>${status}`
            } else
                row.cells[i].textContent = user_data[i].children[0].value;
        }
        user_profile.style.display = 'none';

    };

}

// ------------------------ View user information ------------------------ //

function ViewUserInfo() {
    var profile_save = document.querySelector('#user_profile .save');
    var profile_add = document.querySelector('#user_profile .add');
    var user_view_btn = document.querySelectorAll('.user_setting .user_view');
    var user_data = document.querySelectorAll('#user_profile div:not(:last-child)');
    var users = document.querySelector('#user_table table tbody');

    // console.log(users);
    user_view_btn.forEach((item, index) => {
        item.addEventListener("click", () => {
            profile_save.style.display = 'none';
            profile_add.style.display = 'none';
            user_profile.style.display = 'flex'
            var row = item.parentNode.parentNode;
            for (var i = 0; i < row.cells.length - 1; ++i) {
                user_data[i].children[0].value = row.cells[i].textContent.trim();
                user_data[i].children[0].disabled = true;
            }
        })
    });
}

// ------------------------ Delete user ------------------------ //

function DeleteUser() {
    var user_delete = document.querySelectorAll('.user_setting .user_delete');
    var users = document.querySelector('#user_table table tbody');
    // console.log(users)

    user_delete.forEach((item, index) => {
        item.addEventListener("click", () => {
            var confirm = window.confirm("Are u sure about that?");
            if (confirm) {
                var row = item.parentNode.parentNode;
                console.log(row);
                users.removeChild(row);
            }
            else {

            }
        })
    })
}


function search() {
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

LoadUser();
CloseUserInfo();
EditUserInfo();
ViewUserInfo();
DeleteUser();
AddUser();
search();

// var modal = document.getElementById("user_profile");
// // window.onclick = function(event) {
// //     if (modal.style.display === 'none' ) {
// //         modal.style.display = "flex";
// //     }
// // }