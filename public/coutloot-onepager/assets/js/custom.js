$(document).ready(function () {
	$('.sidenav').sidenav();
	window.addEventListener("resize", function () {
		resize();
	});
	resize();
});

function resize() {
	if (window.innerWidth < 992) {
		$('.second-block').css("margin-top", $(".overlay-text").height());
	} else {
		$('.second-block').css("margin-top","7%");
	}
}