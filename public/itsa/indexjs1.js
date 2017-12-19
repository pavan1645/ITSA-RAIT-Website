$(document).ready(function(){

	
    $('a[href*="#"]:not([href*="Carousel"]').click(function(e) {

        $('html,body').animate({ scrollTop: jQuery(this.hash).offset().top-20}, 500);


        e.preventDefault();
	        
        $('a').each(function () {
	            $(this).removeClass('active');
	        })
	    $(this).addClass('active');
        return false;
	});


    var maxLength = 300;
    if ($(window).width()<500) {
		$(".show-read-more").each(function(){
			var myStr = $(this).text();
			if($.trim(myStr).length > maxLength){
				var newStr = myStr.substring(0, maxLength);
				var removedStr = myStr.substring(maxLength, myStr.length);
				$(this).empty().html(newStr);
				$(this).append('<a href="javascript:void(0);" class="read-more"> read more...</a>');
				$(this).append('<span class="more-text">' + removedStr + '</span>');
			}
		});
		$(".read-more").click(function(){
			$(this).siblings(".more-text").contents().unwrap();
			$(this).remove();
		});
	}
});