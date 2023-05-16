$(function () {
  const clickmenu = document.querySelector(`.myMenu-navbar`);
  const oppenmenu = document.querySelector(`.icon-menu-RPS .icon-oppen-menu`);
  const closemenu = document.querySelector(`.icon-menu-RPS .icon-close-menu`);
  oppenmenu.addEventListener("click", function (e) {
    clickmenu.style.display = `block`;
    oppenmenu.style.display = `none`;
    closemenu.style.display = `block`;
  });
  closemenu.addEventListener("click", function (e) {
    clickmenu.style.display = `none`;
    oppenmenu.style.display = `block`;
    closemenu.style.display = `none`;
  });
});
