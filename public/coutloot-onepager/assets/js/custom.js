var content = [
	{
		"title": "A Q&A with Antony Jenkins",
		"desc": "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi fugiat consectetur fuga quibusdam ea corrupti doloribus beatae? Laboriosam qui quasi vitae omnis! Reprehenderit unde praesentium ratione temporibus ab? Sunt, velit?",
		"color": "#e0f7fa"
	},
	{
		"title": "A Q&A with 2 Jenkins",
		"desc": "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi fugiat consectetur fuga quibusdam ea corrupti doloribus beatae? Laboriosam qui quasi vitae omnis! Reprehenderit unde praesentium ratione temporibus ab? Sunt, velit?",
		"color": "#b2dfdb"
	},
	{
		"title": "A Q&A with 3 Jenkins",
		"desc": "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi fugiat consectetur fuga quibusdam ea corrupti doloribus beatae? Laboriosam qui quasi vitae omnis! Reprehenderit unde praesentium ratione temporibus ab? Sunt, velit?",
		"color": "#d1c4e9"
	},
	{
		"title": "A Q&A with Antony Jenkins",
		"desc": "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi fugiat consectetur fuga quibusdam ea corrupti doloribus beatae? Laboriosam qui quasi vitae omnis! Reprehenderit unde praesentium ratione temporibus ab? Sunt, velit?",
		"color": "#f8bbd0"
	}
]

$(document).ready(function () {
	$('.sidenav').sidenav({ "edge": "right" });
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
var instance;
function loadSideNav(index) {
	$('#custom-sidenav').css("background-color", content[index].color)
	$('#custom-sidenav .title').text(content[index].title);
	$('#custom-sidenav .desc').text(content[index].desc);
	var elem = document.querySelector('#custom-sidenav');
	instance = M.Sidenav.init(elem, {"edge":"right"});
	instance.open();
}

function closenav() {
	instance.close();
}

function openUrl(url) {
	window.open("https://"+url, "_blank")
}