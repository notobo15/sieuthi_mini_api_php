$(document).ready(function () {
  const container = document.querySelector(".container"),
    pwShowHide = document.querySelectorAll(".showHidePw"),
    pwFields = document.querySelectorAll(".password"),
    signUp = document.querySelector(".signup-link"),
    login = document.querySelector(".login-link");

  //   js code to show/hide password and change icon
  pwShowHide.forEach((eyeIcon) => {
    eyeIcon.addEventListener("click", () => {
      pwFields.forEach((pwField) => {
        if (pwField.type === "password") {
          pwField.type = "text";

          pwShowHide.forEach((icon) => {
            icon.classList.replace("uil-eye-slash", "uil-eye");
          });
        } else {
          pwField.type = "password";

          pwShowHide.forEach((icon) => {
            icon.classList.replace("uil-eye", "uil-eye-slash");
          });
        }
      });
    });
  });

  // js code to appear signup and login form
  signUp.addEventListener("click", () => {
    console.log(11111);
    container.classList.add("active");
  });
  login.addEventListener("click", () => {
    container.classList.remove("active");
  });

  $("#form-login").submit(function (e) {
    e.preventDefault();
    let name = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    console.log(name, password);
    let check = checkLogin();
    let fd = new FormData();
    fd.append("username", name);
    fd.append("password", password);
    console.log(check);
    if (check) {
      $.ajax({
        url: "./api/accounts/login.php",
        type: "post",
        processData: false,
        contentType: false,
        data: fd,
        success: function (data) {
          let error = document.querySelector("#err_login");
          if (data?.id) {
            console.log(data.id);
            error.style.display = "none";
            $(".modal-alert").removeClass("d-none");
            window.setTimeout(function () {
              $(".alert")
                .fadeTo(500, 0)
                .slideUp(500, function () {
                  $(this).remove();
                  location.assign("./index.php");
                });
            }, 500);
          } else if (data.message == "tai khoan khong ton tai") {
            error.innerHTML = " tai khoan khong ton ta";
            error.style.display = "block";
          } else if (data.message == "khong dung mat khau") {
            error.innerHTML = " khong dung mat khau";
            error.style.display = "block";
          } else {
            error.innerHTML = " dang nhap thanh cong";
            error.style.display = "block";
          }
        },
        error: function (e) {
          console.log(e);
        },
      });
    }
  });
  $("#form-signup").submit(function (e) {
    e.preventDefault();
    let checkValidated = checkRegister();
    console.log(checkValidated);
    let first_name = document.getElementById("first_name").value;
    let last_name = document.getElementById("last_name").value;
    let username = document.getElementById("username_rg").value;
    let phone = document.getElementById("phone").value;
    let password = document.getElementById("password_rg").value;
    let error = document.querySelector("#err_register");
    let fdata = new FormData();
    fdata.append("first_name", first_name);
    fdata.append("last_name", last_name);
    fdata.append("password", password);
    fdata.append("phone", phone);
    fdata.append("name", username);
    if (checkValidated) {
      $.ajax({
        url: "./api/accounts/create.php",
        type: "post",
        processData: false,
        contentType: false,
        data: fdata,
        success: function (data) {
          console.log(data);
          if (data.message == "account Created") {
            error.style.display = "none";
            $(".modal-alert").removeClass("d-none");
            $(".modal-alert strong").text("Bạn đã đăng kí thành công!");
            window.setTimeout(function () {
              $(".alert")
                .fadeTo(500, 0)
                .slideUp(500, function () {
                  $(this).remove();
                  location.assign("./index.php");
                });
            }, 500);
          } else if (data.message == "tai khoan da ton tai") {
            error.innerHTML = " tai khoan da ton tai";
            error.style.display = "block";
          } else if (data.message == "account Not Created") {
            error.innerHTML = " account Not Created";
            error.style.display = "block";
          }
        },
        error: function (e) {
          console.log(e);
        },
      });
    }
  });

  function checkLogin() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    let error = document.querySelector("#err_login");

    if (username.value.length <= 3 || username.value.length >= 10) {
      error.innerHTML = "Độ dài username phải lớn hơn 3 và nhỏ hơn 10!";
      error.style.display = "block";
      username.focus();
      return false;
    }
    if (username.value.includes(" ")) {
      error.innerHTML = "Username không được chứa khoảng trắng!";
      error.style.display = "block";
      username.focus();
      return false;
    }
    if (username.value.toLowerCase() != username.value) {
      error.innerHTML = "Username phải là chuỗi kí tự thường!";
      error.style.display = "block";
      username.focus();
      return false;
    }
    if (password.value.length <= 3) {
      error.innerHTML = "Độ dài password phải lớn hơn 3!";
      error.style.display = "block";
      password.focus();
      return false;
    }
    error.style.display = "none";
    return true;
  }

  function checkRegister() {
    let first_name = document.getElementById("first_name");
    let last_name = document.getElementById("last_name");
    let username = document.getElementById("username_rg");
    let phone = document.getElementById("phone");
    let password = document.getElementById("password_rg");
    let passwordConfirm = document.getElementById("password_rg_confirm");
    let error = document.querySelector("#err_register");

    if (first_name.value.length < 4 || first_name.value.length >= 10) {
      error.innerHTML = "Độ dài First Name phải lớn hơn 0 và nhỏ hơn 10!";
      error.style.display = "block";
      first_name.focus();
      return false;
    }
    if (last_name.value.length < 4 || last_name.value.length >= 40) {
      error.innerHTML = "Độ dài Last Name phải lớn hơn 0 và nhỏ hơn 40!";
      error.style.display = "block";
      last_name.focus();
      return false;
    }

    if (username.value.length < 4 || username.value.length >= 10) {
      error.innerHTML = "Độ dài username phải lớn hơn 4 và nhỏ hơn 10!";
      error.style.display = "block";
      username.focus();
      return false;
    }
    let regex = /^\d{10}$/;
    if (!phone.value.match(regex)) {
      error.innerHTML = "SĐT phải là số và phải có độ dài = 10!";
      error.style.display = "block";
      phone.focus();
      return false;
    }
    if (password.value.length < 4) {
      error.innerHTML = "Độ dài password phải lớn hơn 4!";
      error.style.display = "block";
      password.focus();
      return false;
    }
    if (password.value !== passwordConfirm.value) {
      error.innerHTML = "Password không trùng khớp!";
      error.style.display = "block";
      passwordConfirm.focus();
      return false;
    }
    error.style.display = "none";
    return true;
  }
  function checkLogin() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var error = document.querySelector("#err_login");
    if (username.value.length < 4 || username.value.length >= 10) {
      error.innerHTML = "Độ dài username phải lớn hơn 4 và nhỏ hơn 10!";
      error.style.display = "block";
      username.focus();
      return false;
    }
    if (username.value.includes(" ")) {
      error.innerHTML = "Username không được chứa khoảng trắng!";
      error.style.display = "block";
      username.focus();
      return false;
    }
    if (username.value.toLowerCase() != username.value) {
      error.innerHTML = "Username phải là chuỗi kí tự thường!";
      error.style.display = "block";
      username.focus();
      return false;
    }
    if (password.value.length < 4) {
      error.innerHTML = "Độ dài password phải lớn hơn 4!";
      error.style.display = "block";
      password.focus();
      return false;
    }
    error.style.display = "none";
    return true;
  }
});
