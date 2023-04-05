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
  container.classList.add("active");
});
login.addEventListener("click", () => {
  container.classList.remove("active");
});

function checkLogin() {
  var username = document.getElementById("username");
  var password = document.getElementById("password");
  let error = document.querySelector("#err_login");

  if (username.value.length <= 4 || username.value.length >= 10) {
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
  if (password.value.length <= 4) {
    error.innerHTML = "Độ dài password phải lớn hơn 4!";
    error.style.display = "block";
    password.focus();
    return false;
  }
  error.style.display = "none";
  return true;
}

function checkRegister() {
  var first_name = document.getElementById("first_name");
  var last_name = document.getElementById("last_name");
  var username = document.getElementById("username_rg");
  var phone = document.getElementById("phone");
  var password = document.getElementById("password_rg");
  var passwordConfirm = document.getElementById("password_rg_confirm");
  let error = document.querySelector("#err_register");

  if (first_name.value.length <= 0 || first_name.value.length >= 10) {
    error.innerHTML = "Độ dài First Name phải lớn hơn 0 và nhỏ hơn 10!";
    error.style.display = "block";
    first_name.focus();
    return false;
  }
  if (last_name.value.length <= 0 || last_name.value.length >= 40) {
    error.innerHTML = "Độ dài Last Name phải lớn hơn 0 và nhỏ hơn 40!";
    error.style.display = "block";
    last_name.focus();
    return false;
  }
  if (username.value.length <= 4 || username.value.length >= 10) {
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
  if (password.value.length <= 4) {
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
