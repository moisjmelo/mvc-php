$(function(){
    $('.menu-mobile').hover(function(){
        $(this).find('.nav-mobile').slideDown();
        $(this).hover(backgroundcolor = "yellow");
    }, function(){
        $(this).find('.nav-mobile').slideUp();
    });
    
});