// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");
let user_contain = document.querySelector("#user_container");
let product_contain = document.querySelector("#product_container");


function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
  ;
  if (this.querySelector('.title').innerHTML==="Users") {
    user_contain.style.display = "block";
    product_contain.style.display = "none";
  } else if (this.querySelector('.title').innerHTML==="Products") {
    user_contain.style.display = "none";
    product_contain.style.display = "block";
  }
}


list.forEach((item) => item.addEventListener("click", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");

};


