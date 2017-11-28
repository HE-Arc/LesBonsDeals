$(document).ready(function(){
    var windowWidth = $( window ).width();
    $('.owl-wrapper').css('width', windowWidth);
    $('.owl-carousel').owlCarousel({
        loop:false,
        autoWidth:true,
        nav:true
    })
});