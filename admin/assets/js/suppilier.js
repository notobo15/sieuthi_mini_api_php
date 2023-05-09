function LoadSuppilier() {
  return new Promise((resolve, reject) => {
    var xml = new XMLHttpRequest();
    xml.open("GET", "../api/suppilier/list.php", true);
    xml.send();
    xml.onload = function () {
      let sups = JSON.parse(this.responseText);
      var html = ``;
      for (const sup of sups) {
        html += ` <tr><td>${sup.id}</td>
                <td>${sup.name}</td>
                <td>${sup.address}</td>
                <td>${sup.phone}</td>
                <td>${sup.isDeleted}</td>
                <td>
                    <button class="edit" value="${sup.id}">Edit</button>
                    <button class="delete" value="${sup.id}">Delete</button>
                </td> </tr>`;
      }
      document.querySelector(
        "#suppilier_container .suppilier_table tbody"
      ).innerHTML = html;
      resolve();
    };

    xml.onerror = function () {
      console.log("** An error occurred during the load suppilier");
      reject();
    };

    xml.onprogress = (event) => {
      // triggers periodically
      // event.loaded - how many bytes downloaded
      // event.lengthComputable = true if the server sent Content-Length header
      // event.total - total number of bytes (if lengthComputable)
      console.log(
        `Received ${event.loaded} of ${event.total}: ${event.lengthComputable}`
      );
    };
  });
}

function EditSuppilier() {
  var edits = document.querySelectorAll("#suppilier_container .edit");

  for (const edit of edits) {
    edit.addEventListener("click", () => {
      // ---------------------------- Load form -------------------------------------------------//
      const doc = document.querySelector(".main");
      if (doc.querySelector("#form_popup") !== null) {
        var rm = doc.querySelector("#form_popup");
        doc.removeChild(rm);
      }

      var data = edit.parentNode.parentNode.querySelectorAll("td");
      // console.log(data);
      var html = document.createElement("form");
      html.id = "form_popup";
      html.innerHTML = `
                <div class="close">&times;</div>
                <div class="form_profile" >
                    
                    <div class="form_ele">
                        <input type="hidden" name="id" id="suppilier_id" value="${data[0].textContent}">
                    </div>
                    <div class="form_ele">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="suppilier_name" value="${data[1].textContent}">
                    </div>
                    <div class="form_ele">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="suppilier_address" value="${data[2].textContent}">
                    </div>  
                    <div class="form_ele">
                        <label for="phone">phone</label>
                        <input type="text" name="phone" id="suppilier_phone" value="${data[3].textContent}">
                    </div>  
                    <div class="form_footer">
                        <Button class="save" disabled style="pointer-events: none">Save</Button>
                        <Button class="cancel" type="button">Cancel</Button>
                    </div> 
                </div>`;

      document.querySelector(".main").appendChild(html);

      // ---------------------------- Disable save button -------------------------------------------------//
      var a = doc.querySelector("#form_popup");
      a.addEventListener("input", () => {
        let save = a.querySelector(".save");
        save.disabled = false;
        save.style.pointerEvents = "auto";
      });

      // ---------------------------- Close suppilier profile -------------------------------------------------//
      var close = document.querySelector("#form_popup .close");
      var cancel = document.querySelector("#form_popup .cancel");
      var form_popup = document.querySelector("#form_popup");

      close.addEventListener("click", () => {
        document.querySelector(".main").removeChild(form_popup);
      });

      cancel.addEventListener("click", () => {
        document.querySelector(".main").removeChild(form_popup);
      });

      setTimeout(() => {
        window.addEventListener("click", function RmCart(event) {
          let form = this.document.querySelector("#form_popup") || null;
          if (form && event.target !== form && !form.contains(event.target)) {
            document.querySelector(".main").removeChild(form);
            window.removeEventListener("click", RmCart);
          } else if (form === null) {
            window.removeEventListener("click", RmCart);
          }
        });
      }, 100);

      // ---------------------------- save suppilier profile -------------------------------------------------//
      var form = document.querySelector("#form_popup");
      form.addEventListener("submit", (e) => {
        e.preventDefault();
        const fd = new FormData(form);
        fetch("../api/suppilier/update.php", {
          method: "post",
          body: fd,
        })
          .then((res) => res.text())
          .then((res) => console.log(res))
          .catch((err) => console.log(err));
      });
    });
  }
}

function DeleteSuppilier() {
  var deletes = document.querySelectorAll("#suppilier_container .delete");
  for (const del of deletes) {
    del.addEventListener("click", () => {
      let row = del.parentNode.parentNode;
      var confirm = window.confirm(
        `Do you want to delete: ${row.children[1].textContent} ??`
      );
      if (confirm) {
        row.parentNode.removeChild(row);
        let xml = new XMLHttpRequest();
        xml.open("POST", `../api/suppilier/delete.php`);
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

function searchSuppilier() {
  const search = document.querySelector(
    "#suppilier_container .input-group input"
  ),
    table_rows = document.querySelectorAll(".suppilier_table tbody tr");
  // console.log(search.innerHTML);

  search.addEventListener("input", () => {
    table_rows.forEach((row, i) => {
      let table_data = row.textContent.toLowerCase(),
        search_data = search.value.toLowerCase();
      row.classList.toggle("hide", table_data.indexOf(search_data) < 0);
    });
  });
}

function AddSuppilier() {
  var add = document.querySelector(".add_suppilier_btn");

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
        
        <div class="form_ele">
            <input type="hidden" name="id" id="suppilier_id" value="">
        </div>
        <div class="form_ele">
            <label for="name">Name</label>
            <input type="text" name="name" id="suppilier_name" value="">
        </div>
        <div class="form_ele">
            <label for="address">Address</label>
            <input type="text" name="address" id="suppilier_address" value="">
        </div>  
        <div class="form_ele">
            <label for="phone">phone</label>
            <input type="text" name="phone" id="suppilier_phone" value="">
        </div>  
        <div class="form_footer">
            <Button class="save" disabled style="pointer-events: none">Add</Button>
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
      fetch("../api/suppilier/create.php", {
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

  });
}

//---------------------------- Active functions -------------------------------------//
LoadSuppilier()
  .then(() => {
    console.log(`Load suppilier table complete`);
    AddSuppilier();
    EditSuppilier();
    DeleteSuppilier();
    searchSuppilier();
  })
  .catch(() => {
    console.log(`Load suppilier table fail`);
  });

function ReLoadSuppilier() {
  var reload = document.querySelector("#suppilier_container .reload_suppilier_btn");
  reload.addEventListener("click", () => {
    document
      .querySelector("#suppilier_container .suppilier_table tbody")
      .replaceChildren();
    LoadSuppilier()
      .then(() => {
        console.log(`Load suppilier table complete`);
        AddSuppilier();
        EditSuppilier();
        DeleteSuppilier();
        searchTable();
      })
      .catch(() => {
        console.log(`Load suppilier table fail`);
      });
  });
}

ReLoadSuppilier();
