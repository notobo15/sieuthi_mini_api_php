$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "./api/accounts/cart/list.php",
        success: function(data){
            console.log(data);
        }
    })
})