var content = [
	{
		"title": "Techie",
		"desc": $('.sidenav-contents .techie').html(),
		"color": "#63c0c6"
	},
	{
		"title": "FAQs",
		"desc": $('.sidenav-contents .faq').html(),
		"color": "#c0d2e7"
	},
	{
		"title": "What do we do?",
		"desc": $('.sidenav-contents .wdwd').html(),
		"color": "#bec0e0"
	},
	{
		"title": "Apply",
		"desc": $('.sidenav-contents .apply').html(),
		"color": "#fff"
	},
	//Add here new
	{
		"title": "Menu",
		"desc": "<ul id=\"menu-sidenav\"><li><a onclick=\"closenav()\">Techie</a></li><li><a onclick=\"loadSideNav(1, '')\">FAQs</a></li><li><a onclick=\"loadSideNav(2, '')\">What do we do?</a></li><li><a onclick=\"loadSideNav(3, '')\">Apply</a></li></ul>",
		"color": "#22222a"
	}
]

var isSidenavOpen = false;
var sidenavWidth = "100%";

$(window).on("load", function () {
	$("#loader").css("display", "none");
	$("#display-content").css("display","block");
	resize();
});

$(document).ready(function () {
	$('select').formSelect();
	$('.sidenav').sidenav({ "edge": "right" });
	window.addEventListener("resize", function () {
		resize();
	});
	$(document).mouseup(function (e) {
		var container = $("#custom-sidenav");
		var snTrigger = $('.sidenav-trigger');
		// if the target of the click isn't the container nor a descendant of the container
		if (!container.is(e.target) && container.has(e.target).length === 0 && isSidenavOpen) {
			isSidenavOpen = false;
			closenav();
		}
	});
});

function resize() {
	if (window.innerWidth < 992) {
		$('.second-block').css("margin-top", $(".overlay-text").height());
		sidenavWidth = "100%";
	} else {
		$('.second-block').css("margin-top","7%");
		sidenavWidth = "70vw";
	}
	$("#custom-sidenav .header").css("width", sidenavWidth);
}

function loadSideNav(index, dest) {
	if (!isSidenavOpen) {
		isSidenavOpen = true;
		$('#custom-sidenav, #custom-sidenav .header').css("background-color", content[index].color);
		/* If its menu sidenav change colors to white */
		if (index == content.length-1) {
			$('#custom-sidenav .header').css("color","white");
			isSidenavOpen = false;
		} else $('#custom-sidenav .header').css("color", "rgb(36, 36, 36)");
		
		$('#custom-sidenav .sidenav-title').text(content[index].title);
		$('#custom-sidenav .desc').html(content[index].desc);
		
		/* Code for forms */
		if (content[index].title == "Apply") {
			$('select').formSelect();
			$('select').change(function () {
				if ($(this).val() != "0") $('.expDesc').css('display', 'block')
				else $('.expDesc').css('display', 'none')
			});
			
			$(".form").submit(function (e) {
				e.preventDefault();
				formSubmit(e);
			});
		}
		
		$('#custom-sidenav').css("width",sidenavWidth);
		$(".hover").css("pointer-events", "none");
	} else {
		isSidenavOpen = false;
		closenav();
	}
}

function closenav() {
	isSidenavOpen = false;
	$('#custom-sidenav').css("width", "0px");
	$(".hover").css("pointer-events", "auto");
}

function openUrl(url) {
	window.open("https://"+url, "_blank")
}

function displaySpan(el) {
	if ($(el).next().next().find("span").css("display") == 'none') $(el).next().next().find("span").css("display", "block");
	else $(el).next().next().find("span").css("display", "none")
}

function formSubmit(e) {
	var fd = new FormData();
	fd.append('inputs',$("#form").serializeArray());
	var myFile = $('#file')[0].files[0];
	fd.append('file',myFile);
	console.log(fd.get("inputs"));
	console.log(fd.get("file"));
}

//Scrolls to top of the page
function st() {
	$('html, body').animate({
		scrollTop: 0
	}, 1000);
}