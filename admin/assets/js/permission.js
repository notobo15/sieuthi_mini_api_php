// function LoadGroupId() {
//     return new Promise((resolve, reject) => {
//         var xml = new XMLHttpRequest();
//         xml.open("GET", '../api/permission/list.php', true);
//         xml.send();
//         xml.onload = function () {
//             let pers = JSON.parse(this.responseText);
//             var html = ``;
//             for (const per of pers) {
//                 html += `<tr>
//                 <td>${per.group_id}</td>
//                 <td>${per.name}</td>
//                 <td>
//                     <button class="edit" value="${per.group_id}">Edit</button>
//                     <button class="delete" value="${per.group_id}">Delete</button>
//                 </td>
//             </tr>`;
//             }
//             document.querySelector('#permission_container .permission_table tbody').innerHTML = html;
//             resolve();
//         }

//         xml.onerror = function () {
//             console.log("** An error occurred during the load discount");
//             reject();
//         }

//         xml.onprogress = (event) => { // triggers periodically
//             // event.loaded - how many bytes downloaded
//             // event.lengthComputable = true if the server sent Content-Length header
//             // event.total - total number of bytes (if lengthComputable)
//             console.log(`Received ${event.loaded} of ${event.total}: ${event.lengthComputable}`);
//         };
//     });
// }

function EditGroupId() {
  var edits = document.querySelectorAll("#permission_container .edit");
  for (const edit of edits) {
    edit.addEventListener("click", () => {
      // let xml = new XMLHttpRequest();
      // xml.open('GET', `../api/group_permission/detail.php?id=${edit.value}`)
      // xml.send();
      // xml.onload = () => {
      //     let group_pers = JSON.parse(xml.responseText);
      let html = document.createElement("form");
      html.id = "cart";
      html.innerHTML = `
                <div class="cart_header">
                <button class="close" type="button">&times;</button>
                <button class="save" type="submit">Save</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Read</th>
                        <th>Create</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th >1</th>
                        <td>User Myself</td>
                        <td>
                          <input type="checkbox" name="pers[]" value="1" id="accounts/myself" />
                        </td>
                        <td>
                          <!-- <input type="checkbox" name="pers[]" value="" id="per_" /> -->
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="2" id="accounts/myself/edit" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="3" id="accounts/myself/delete" />
                        </td>
                      </tr>
                      <tr>
                        <th>2</th>
                        <td>Accounts</td>
                        <td>
                          <?php echo 1; ?> 
                          <input type="checkbox" name="pers[]" value="4" id="accounts/list" />
                        </td>
                        <td>
                          <!-- <input type="checkbox" name="pers[]" value="" id="per_" /> -->
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="5" id="accounts/update" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="6" id="accounts/Delete" />
                        </td>
                      </tr>
                
                      <tr>
                        <th >3</th>
                        <td>Orders</td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                      </tr>
                      <tr>
                        <th >4</th>
                        <td>Products</td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                      </tr>
            
                      <tr>
                        <th >5</th>
                        <td>Discount</td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                      </tr>
                      <tr>
                        <th >6</th>
                        <td>Category</td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                      </tr>
                      
            
                      <tr>
                        <th >7</th>
                        <td>Suppilier</td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                      </tr>
                      <tr>
                        <th >8</th>
                        <td>Group</td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                        <td>
                          <input type="checkbox" name="pers[]" value="" id="per_" />
                        </td>
                      </tr>
                </tbody>
            </table>`;
      document.querySelector(".main").appendChild(html);

      // ----------------------------------- load checkbox permission ----------------------------------- //
      // for (const group_per of group_pers) {
      //     document.querySelector(`#per_${group_per.permission_id}`).checked =true;
      // }

      // ----------------------------------- Close cart ----------------------------------- //
      let close = document.querySelector("#cart .cart_header .close");
      close.onclick = () => {
        document
          .querySelector(".main")
          .removeChild(close.parentNode.parentNode);
      };

      setTimeout(() => {
        window.addEventListener("click", function RmCart(event) {
          let cart = this.document.querySelector("#cart") || null;
          if (cart && event.target !== cart && !cart.contains(event.target)) {
            document.querySelector(".main").removeChild(cart);
            window.removeEventListener("click", RmCart);
          } else if (cart === null) {
            window.removeEventListener("click", RmCart);
          }
        });
      }, 100);

      // ----------------------------------- Upload form to server ----------------------------------- //

      // let form = document.querySelector('#cart');
      // form.addEventListener('submit', (e) => {
      //     e.preventDefault();
      //     const fd = new FormData(form);
      //     fetch('../api/group_permission/update.php',
      //     {
      //         method: 'post',
      //         body: fd,
      //     }
      // )
      //     .then(res => res.text())
      //     .then(res => console.log(res))
      //     .catch(err => console.log(err))
      // })
      // }
    });
  }
}

function Delete() {
  var deletes = document.querySelectorAll("#permission_container .delete");
  for (const del of deletes) {
    del.addEventListener("click", () => {
      let row = del.parentNode.parentNode;
      var confirm = window.confirm(
        `Do you want to delete: ${row.children[1].textContent} ??`
      );
      if (confirm) {
        row.parentNode.removeChild(row);
        let xml = new XMLHttpRequest();
        xml.open("POST", `../api/groups/delete.php`);
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
  }
}

function AddGroups() {
  var add = document.querySelector(".add_permission_btn");

  add.addEventListener("click", () => {
    // ---------------------------- Load form -------------------------------------------------//
    const doc = document.querySelector(".main");
    if (doc.querySelector("#form_popup") !== null) {
      let rm = doc.querySelector("#form_popup");
      doc.removeChild(rm);
    }
    // console.log(data);
    var html = document.createElement("form");
    html.id = "form_popup";
    html.innerHTML = `
             <div class="close">&times;</div>
             <div class="form_profile" >
                 
                 <div class="form_ele">
                 <label for="name">Role'name </label>
                 <input type="text" name="name" id="" value="">
                 </div>
                 <div class="form_footer">
                     <button class="add" disabled style="pointer-events: none" type="submit">Add</button>
                     <Button class="cancel">Cancel</Button>
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

    // ---------------------------- Close groups profile -------------------------------------------------//
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
      fetch("../api/groups/create.php", {
        method: "post",
        body: fd,
      })
        .then((res) => res.text())
        .then((res) => console.log(res))
        .catch((err) => console.log(err));
    });
  });
}

function SearchPermission() {
  const search = document.querySelector(
      "#discount_container .input-group input"
    ),
    table_rows = document.querySelectorAll(".discount_table tbody tr");
  // console.log(search.innerHTML);

  search.addEventListener("input", () => {
    table_rows.forEach((row, i) => {
      let table_data = row.textContent.toLowerCase(),
        search_data = search.value.toLowerCase();
      row.classList.toggle("hide", table_data.indexOf(search_data) < 0);
    });
  });
}

function ReLoadPermission() {
  var reload = document.querySelector(
    "#permission_container .reload_permission_btn"
  );
  reload.addEventListener("click", () => {
    console.log("abc");
    document
      .querySelector("#permission_container .permission_table tbody")
      .replaceChildren();
    LoadCategory()
      .then(() => {
        console.log(`Load groups table complete`);
        EditGroupId();
        Delete();
        AddGroups();
      })
      .catch(() => {
        console.log(`Load groups table fail`);
      });
  });
}

// ---------------------------------- Active func ------------------------------------------ //
// LoadGroupId()
//         .then(() => {
//             EditGroupId();
//             Delete() ;
//              AddGroups();
//          SearchPermission();
//         })

EditGroupId();
Delete();
AddGroups();
SearchPermission();
// ReLoadPermission();
