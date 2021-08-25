
jQuery(window).load(function () {

    // Loading Page
        $(".loader").fadeOut(500,function(){

            $(".loading").delay(1000).fadeOut(500);

        });
        $("body").css("overflow-y", "auto");
    // #Loading Page
    // menu list
        if ($(window).width() < 990) {
            $('.menu_list').slideUp();
        }
    // #menu list
    // grid & list
        $(".blockRow").removeClass("col-md-12");
        $(".blockRow").addClass("col-md-4");
        $(".upBlockRow").removeClass("flex");
        $(".blockImgRow").removeClass("flex_25");
        $(".blockContentRow").removeClass("flex_75");
    // grid & list
    // ajax Success grid list
        $( document ).ajaxSuccess(function( event, request, settings ) {
            $(".blockRow").removeClass("col-md-12");
            $(".blockRow").addClass("col-md-4");
            $(".upBlockRow").removeClass("flex");
            $(".blockImgRow").removeClass("flex_25");
            $(".blockContentRow").removeClass("flex_75");
        });
    // ajax Success grid list
});
/// scrooltop nav-bar

// footer bar in scroll in mobile
    var lastScrollTop = 0;
    $(window).scroll(function(event){
        var st = $(this).scrollTop();
        if (st > lastScrollTop){
            // downscroll code
            $('.Tab_mobile ul').addClass('fading_scroll');
        } else {
            // upscroll code
            $('.Tab_mobile ul').removeClass('fading_scroll');
        }
        lastScrollTop = st;
    });
// footer bar in scroll in mobile
// grid & list click function
    $('.clickShowGrid').click(function() {
        $(".blockRow").removeClass("col-md-12");
        $(".blockRow").addClass("col-md-4");
        $(".upBlockRow").removeClass("flex");
        $(".blockImgRow").removeClass("flex_25");
        $(".blockContentRow").removeClass("flex_75");
    });

    $('.clickShowList').click(function() {
        $(".blockRow").addClass("col-md-12");
        $(".upBlockRow").addClass("flex");
        $(".blockImgRow").addClass("flex_25");
        $(".blockContentRow").addClass("flex_75");
    });
// grid & list click function

// responsive menu
    $('#nav-icon3').click(function(){
        $('#nav-icon3').addClass('open');
        $(".down_head").addClass('back');
        $(".overlay").addClass('back');
    });

    $('.overlay').click(function(){
        $('#nav-icon3').removeClass('open');
        $(".down_head").removeClass('back');
        $(".menu_filter_item").removeClass('back');
        $(".search").removeClass('fading_mobile');
        $(".block_footer").removeClass('fading_mobile');
        $(".overlay").removeClass('back');
    });

    $('.open_filter_item').click(function(){
        $(".menu_filter_item").addClass('back');
        $(".overlay").addClass('back');
    });
// #responsive menu
// menu list
if ($(window).width() < 990) {
    $('.clickDrops').click(function(event){
        event.preventDefault();
        var currentContent = $(this).siblings('.menu_list');
        $('.menu_list').not(currentContent).slideUp();
        currentContent.slideToggle();
    });
}
// #menu list

/// Open Form Search
    $('.open_search').click(function(){
        $(".search").addClass('fading_mobile');
        $(".overlay").addClass('back');
    });
/// Open Form Search
/// Open Social_Media
    $('.open_social a').click(function(event){
        event.preventDefault();
        $('#nav-icon3').removeClass('open');
        $(".down_head").removeClass('back');
        $(".block_footer").addClass('fading_mobile');
    });
/// Open Social_Media


toastr.options = {
    "closeButton"  : true,
    // "positionClass": "toast-top-center",
    "progressBar"  : true,
}

window.addEventListener("offline",
    ()=> {
        if (lang == 'ar'){
            $('.internet_connection_text').html("مشكله في الاتصال بالانترنت ")
        } else{
            $('.internet_connection_text').html("Internet connection problem")
        }
        $('.internet_connection').css("display" ,'flex').removeClass('bgSuccess').addClass('bgError');
        $('.internet_connection_icon').html(`<i class="fas fa-exclamation-triangle"></i>`).removeClass('rotating')
        setTimeout(function(){
            if (lang == 'ar'){
                $('.internet_connection_text').html("جاري محاوله الاتصال بالانترنت")
            } else{
                $('.internet_connection_text').html("Trying to connect to the Internet")
            }
            $('.internet_connection_icon').html(`<i class="fas fa-spinner"></i>`).addClass('rotating')
            $('.internet_connection').removeClass('bgError').addClass('bgWait');
        }, 3000);

    }
);
window.addEventListener("online",
    ()=> {
        if (lang == 'ar'){
            $('.internet_connection_text').html("تم الاتصال بالانترنت ")
        } else{
            $('.internet_connection_text').html("Internet connection successfully")
        }
        $('.internet_connection_icon').html(`<i class="far fa-check-circle"></i>`).removeClass('rotating')
        $('.internet_connection').removeClass('bgWait').addClass('bgSuccess');
        setTimeout(function(){
            $('.internet_connection').css("display" ,'none')
        }, 5000);
    }
);


window.SpeechRecognition = window.webkitSpeechRecognition || window.SpeechRecognition;
let finalTranscript = '';
let recognition = new window.SpeechRecognition();

recognition.interimResults = true;
if (lang == 'ar'){
    recognition.lang = 'ar-EG';
}else if(lang == 'en'){
    recognition.lang = 'en-us';
}

recognition.onresult = (event) => {
    let interimTranscript = '';
    for (let i = event.resultIndex, len = event.results.length; i < len; i++) {
        let transcript = event.results[i][0].transcript;
        if (event.results[i].isFinal) {
            finalTranscript += transcript;
        } else {
            interimTranscript += transcript;
        }
    }
    $('.keyword').val(finalTranscript + ' ' + interimTranscript)

}

function startRecording(){
    var x = document.getElementById("audio");
    x.play();
    recognition.start();
}
recognition.onspeechend = function() {
    $('.search').submit()
}

/// Scrool Nav



