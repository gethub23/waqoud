
$(document).ready(function(){
    $(".slidToggle").on("click" , function(){
        $(".pagebody").toggleClass("full");
        $(".sidebar").toggleClass("min");
    })
})


$(window).on("load", function(){
    $('.loader').fadeOut("slow" , function (){
        $( '.loader' ).remove();
    });
})