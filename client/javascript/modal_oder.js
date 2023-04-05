const oderElement = document.querySelector(`.icon-oder`);
const modaloder = document.querySelector(`.modal_oder`);
const closeoder = document.querySelector(`.icon-close-oder`);
oderElement.addEventListener('click',function(e){
     modaloder.style.display = 'block';
});
closeoder.addEventListener('click',function(e){
    modaloder.style.display = 'none';
});

