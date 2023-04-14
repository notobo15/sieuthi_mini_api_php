
function checkInformation(){
    var first_name = document.getElementById("first_name");
    var last_name = document.getElementById("last_name");
    var phone = document.getElementById("phone");
    let birthDay = document.getElementById("birth_date");
    let error = document.querySelector(".error");    
    
    let regex = /^\d{10}$/;
    let today = new Date();
    let birthDay_value = new Date(birthDay.value);

    if (first_name.value.length <= 0 || first_name.value.length >= 10) {   
        error.innerHTML = "Độ dài First Name phải lớn hơn 0 và nhỏ hơn 10!";
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
        error.innerHTML = "SĐT phải là số và phải có độ dài = 10!";
        error.style.display = "block";
        phone.focus();
        return false;
    }    
    if(birthDay_value >= today){
        error.innerHTML = "Ngày sinh phải nhỏ hơn hôm nay!";
        error.style.display = "block";
        birthDay.focus();
        return false;
    }

    error.style.display = "none";
    return true;
}