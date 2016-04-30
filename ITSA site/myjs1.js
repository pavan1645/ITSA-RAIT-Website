$(document).ready(function(){
   
    $('a[href*="#"]:not([href*="Carousel"]').click(function() {

        $('html,body').animate({ scrollTop: jQuery(this.hash).offset().top}, 500);

        return false;

        e.preventDefault();

    });

});
