$(document).ready(function(){
    var windowWidth = $( window ).width();
    $('.owl-wrapper').css('width', windowWidth);
    $('.owl-carousel').owlCarousel({
        dots:true,
        loop:false,
        autoWidth:true,
        nav:true,
        navText:['<< Précédent '
            ,'|  Suivant >>']
    })
});