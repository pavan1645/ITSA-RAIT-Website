$('document').ready(function() {
	$('input').focus();
});

$('#input').on("keypress", function(e) {
	if (e.which===13) {
		$('#input').after("<div id=\"list\" class=\"list\"><div id=\"del\" class=\"del fa fa-trash\"></div><span>"+$('#input').val()+"</span></div>");
		$('#input').val("");
		$('#list:first-of-type').hide();
		$('#list:first-of-type').slideDown();		
	}
});

/*$('.main').on('mouseover mouseout','#list', function() {
	$(this).children('#del').animate({
		display:inline
	});

	$(this).children('#del').toggleClass('none del');	
});*/

$('.main').on('click','#list', function() {
	$(this).children('#list span').toggleClass('done');	
});
$('.main').on('click','#del', function(e) {
	e.stopPropagation();
	$(this).parent().fadeOut(500, function(){
		$(this).remove();
	})
});
$('.plus').on('click',function() {
	$(this).toggleClass("fa-plus-circle fa-minus-circle")
	$('#input').slideToggle(100);
	$('#input').focus();
});
