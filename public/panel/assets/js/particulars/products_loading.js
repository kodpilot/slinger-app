$(document).ready(function(){

    $(window).scroll(function(){
    
    var position = $(window).scrollTop();
    var bottom = $(document).height() - $(window).height();
        console.log($(document).height(),$(window).height(),$(window).scrollTop());
    if( position == bottom ){

        console.log("+1");


    }
    });
    
});