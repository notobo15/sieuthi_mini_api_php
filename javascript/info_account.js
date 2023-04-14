$(document).ready(function () {
  let callApiCitySuccess = false;
  let callApiProvincesSuccess = false;
  let callApiWardSuccess = false;
  $("#city").click(function () {
    if (!callApiCitySuccess) {
      $.ajax({
        url: "https://provinces.open-api.vn/api/",
        type: "get",
        success: function (data) {
          console.log(data);
          let html = "<option value=''>------ Chọn ------ </option>";
          data.forEach((e) => {
            html += `<option data=${e.name} value="${e.code}">${e.name}</option>`;
          });
          $("#city").html(html);
          callApiCitySuccess = true;
        },
      });
    }
    $("#ward").html(`<option value=''>------ Chọn ------ </option>`);

    let city = $("#city").val();
    $.ajax({
      url: "https://provinces.open-api.vn/api/d",
      type: "get",
      success: function (data) {
        console.log(data);
        let html = "<option value=''>------ Chọn ------ </option>";
        data.forEach((e) => {
          if (city == e.province_code) {
            html += `<option value="${e.code}">${e.name}</option>`;
          }
        });
        $("#provinces").html(html);
      },
    });
  });
  $("#provinces").click(function () {
    let provinces = $("#provinces").val();
    console.log(provinces);
    $.ajax({
      url: "https://provinces.open-api.vn/api/w",
      type: "get",
      success: function (data) {
        console.log(data);
        let html = "<option value=''>------ Chọn ------ </option>";
        data.forEach((e) => {
          if (provinces == e.district_code) {
            html += `<option value="${e.code}">${e.name}</option>`;
          }
        });
        $("#ward").html(html);
      },
    });
  });
  // $("#ward").click(function () {});

  function checkInformation() {
    var first_name = document.getElementById("first_name");
    var last_name = document.getElementById("last_name");
    var phone = document.getElementById("phone");
    let error = document.querySelector(".error");
    var birthDay = document.getElementById("birth_date");

    var city = document.getElementById("city");
    var province = document.getElementById("provinces");
    var ward = document.getElementById("ward");
    var full_address = document.getElementById("address");

    let regex = /^\d{10}$/;
    let today = new Date();
    var birthDay_value = new Date(birthDay.value);

    if (first_name.value.length <= 0 || first_name.value.length >= 30) {
      error.innerHTML = "Độ dài First Name phải lớn hơn 0 và nhỏ hơn 30!";
      error.style.display = "block";
      first_name.focus();
      return false;
    }
    if (last_name.value.length <= 0 || last_name.value.length >= 30) {
      error.innerHTML = "Độ dài Last Name phải lớn hơn 0 và nhỏ hơn 30!";
      error.style.display = "block";
      last_name.focus();
      return false;
    }

    if (!phone.value.match(regex)) {
      error.innerHTML = "SĐT phải là số và phải có độ dài = 30!";
      error.style.display = "block";
      phone.focus();
      return false;
    }
    if (birthDay_value >= today) {
      error.innerHTML = "Ngày sinh phải nhỏ hơn hôm nay!";
      error.style.display = "block";
      birthDay.focus();
      return false;
    }
    if (!city.value) {
      error.innerHTML = "Địa chỉ không được để trống!";
      error.style.display = "block";
      city.focus();
      return false;
    }
    if (!province.value) {
      error.innerHTML = "Địa chỉ không được để trống!";
      error.style.display = "block";
      province.focus();
      return false;
    }
    if (!ward.value) {
      error.innerHTML = "Địa chỉ không được để trống!";
      error.style.display = "block";
      ward.focus();
      return false;
    }
    error.style.display = "none";
    return true;
  }
  $("#form-info").submit(function (e) {
    e.preventDefault();
    let fd = new FormData();
    let provinces = $("#city").val();
    let district = $("#provinces").val();
    let ward = $("#ward").val();
    let address = $("#address").val();
    let provincesName = $("#city option:selected").text();
    let districtName = $("#provinces option:selected").text();
    let wardName = $("#ward option:selected").text();
    let id = $("#account_id").val();
    date = new Date($("#birth_date").val());
    let gender = $('input[name="gender "]:checked').val();
    delivery_address = `${address}, ${wardName}, ${districtName}, ${provincesName}`;

    fd.append("id", id);
    fd.append("first_name", first_name.value);
    fd.append("last_name", last_name.value);
    fd.append("phone", phone.value);
    fd.append("gender", gender);
    fd.append(
      "birth_date",
      `${date.getFullYear()}-${date.getMonth() + 1}-${date.getDate()}`
    );

    fd.append("gender", "nam");
    fd.append("provinceCode", provinces);
    fd.append("districtCode", district);
    fd.append("wardCode", ward);
    fd.append("delivery_address", delivery_address);
    if (checkInformation()) {
      $.ajax({
        url: "./api/accounts/update.php",
        type: "post",
        processData: false,
        contentType: false,
        data: fd,
        success: function (data) {
          console.log(data);
        },
      });
    }
  });
});
