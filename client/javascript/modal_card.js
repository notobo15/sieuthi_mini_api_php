
$(document).ready(function() {
    const cardElement = document.querySelector(`.icon-card`);
    const modalcard = document.querySelector(`.modal_card`);
    const closecard = document.querySelector(`.icon-close-card`);
    cardElement.addEventListener('click',function(e){
         modalcard.style.display = 'block';
    });
    closecard.addEventListener('click',function(e){
        modalcard.style.display = 'none';
    });
   
    // $('.minus_card').click(function () {
    //     console.log($('.minus_card'));
    //     // let $input = $(this).parent().find('input');
    //     // let count = parseInt($input.val()) - 1;
    //     // count = count < 1 ? 1 : count;
    //     // $input.val(count);
    //     // $input.change();
    //     // return false;
    // });
    // $('.plus_card').click(function () {
    //     let $input = $(this).parent().find('input');
    //     $input.val(parseInt($input.val()) + 1);
    //     $input.change();
    //     return false;
    // });
});