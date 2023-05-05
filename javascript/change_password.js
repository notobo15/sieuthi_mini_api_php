const curPassShowHide = document.querySelector(".cur-pass");
const curPassField = document.querySelector(".current-pass-field");
const newPassShowHide = document.querySelector(".new-pass");
const newPassField = document.querySelector(".new-pass-field");
const confPassShowHide = document.querySelector(".conf-pass");
const confPassField = document.querySelector(".confirm-pass-field");

curPassShowHide.addEventListener("click", () => {
  if (curPassField.type === "password") {
    curPassField.type = "text";
    curPassShowHide.classList.replace("uil-eye-slash", "uil-eye");
  } else {
    curPassField.type = "password";
    curPassShowHide.classList.replace("uil-eye", "uil-eye-slash");
  }
});

newPassShowHide.addEventListener("click", () => {
  if (newPassField.type === "password") {
    newPassField.type = "text";
    newPassShowHide.classList.replace("uil-eye-slash", "uil-eye");
  } else {
    newPassField.type = "password";
    newPassShowHide.classList.replace("uil-eye", "uil-eye-slash");
  }
});

confPassShowHide.addEventListener("click", () => {
  if (confPassField.type === "password") {
    confPassField.type = "text";
    confPassShowHide.classList.replace("uil-eye-slash", "uil-eye");
  } else {
    confPassField.type = "password";
    confPassShowHide.classList.replace("uil-eye", "uil-eye-slash");
  }
});
function checkChangePassword() {
  let error = $(".error");
  let passwordcurrent = $("#password_current").val();
  let password1 = $("#password1").val();
  let password2 = $("#password2").val();
  if (passwordcurrent.length <= 3) {
    error.html("Độ dài password ít nhất 4 kí tư!");
    error.show();
    return false;
  }
  if (password1.length <= 3) {
    error.html("Độ dài password ít nhất 4 kí tư!");
    error.show();
    return false;
  }
  if (password2.length != password1.length) {
    error.html("Xác Nhận Mật Khẩu Không Trùng Khớp");
    error.show();
    $("#password1").focus();
    $("#password1").val("");
    $("#password2").val("");
    return false;
  }

  error.hide();
  return true;
}

$(function () {
  $("#form-change-password").submit(function (e) {
    let error = $(".error");
    e.preventDefault();
    let passwordcurrent = $("#password_current").val();
    let password1 = $("#password1").val();
    let password2 = $("#password2").val();
    console.log(passwordcurrent);
    console.log(password1);
    console.log(password2);

    let isCheck = checkChangePassword();
    let fd = new FormData();
    fd.append("password_current", passwordcurrent);
    fd.append("password", password1);
    console.log(isCheck);
    if (isCheck) {
      $.ajax({
        url: "./api/accounts/changpassword.php",
        type: "post",
        processData: false,
        contentType: false,
        data: fd,
        success: function (data) {
          if (data.statusCode == 200) {
            error.html("Thành Công");
            error.show();
            error.css({ "background-color": "#01c851", color: "#fff" });
            setTimeout(function () {
              location.assign("./index.php");
            }, 300);
          }

          //   let error = document.querySelector("#err_login");
          //   if (data?.id) {
          //     console.log(data.id);
          //     error.style.display = "none";
          //     $(".modal-alert").removeClass("d-none");
          //     window.setTimeout(function () {
          //       $(".alert")
          //         .fadeTo(500, 0)
          //         .slideUp(500, function () {
          //           $(this).remove();
          //           location.assign("./index.php");
          //         });
          //     }, 500);
          //   } else if (data.message == "tai khoan khong ton tai") {
          //     error.innerHTML = " tai khoan khong ton ta";
          //     error.style.display = "block";
          //   } else if (data.message == "khong dung mat khau") {
          //     error.innerHTML = " khong dung mat khau";
          //     error.style.display = "block";
          //   } else {
          //     error.innerHTML = " dang nhap thanh cong";
          //     error.style.display = "block";
          //   }
          // },
          // error: function (e) {
          //   console.log(e);
        },
        error: function (data) {
          if (data.status == 401) {
            error.html("Có Lỗi");
            error.show();
          } else if (data.status == 400) {
            error.html("Mật Khẩu Hiện Tại Chưa Chính Xác");
            error.show();
          }
        },
      });
    }
  });
});
