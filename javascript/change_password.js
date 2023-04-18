
const curPassShowHide = document.querySelector('.cur-pass');
const curPassField = document.querySelector('.current-pass-field');
const newPassShowHide = document.querySelector('.new-pass');
const newPassField = document.querySelector('.new-pass-field');
const confPassShowHide = document.querySelector('.conf-pass');
const confPassField = document.querySelector('.confirm-pass-field');

curPassShowHide.addEventListener("click", () => {
    if(curPassField.type === "password"){
        curPassField.type = "text";
        curPassShowHide.classList.replace("uil-eye-slash","uil-eye");
    }
    else{
        curPassField.type = "password";
        curPassShowHide.classList.replace("uil-eye","uil-eye-slash");       
    }
})

newPassShowHide.addEventListener("click", () => {
    if(newPassField.type === "password"){
        newPassField.type = "text";
        newPassShowHide.classList.replace("uil-eye-slash","uil-eye");
    }
    else{
        newPassField.type = "password";
        newPassShowHide.classList.replace("uil-eye","uil-eye-slash");       
    }
})

confPassShowHide.addEventListener("click", () => {
    if(confPassField.type === "password"){
        confPassField.type = "text";
        confPassShowHide.classList.replace("uil-eye-slash","uil-eye");
    }
    else{
        confPassField.type = "password";
        confPassShowHide.classList.replace("uil-eye","uil-eye-slash");       
    }
})



