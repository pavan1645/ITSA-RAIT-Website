var content = [
	{
		"title": "",
		"desc": "\
		<a><h5 id='one1'> — February 06, 2018</h5>\
		<h5> A Q&A with Antony Jenkins</h5></a>\
		<h6>10x Future Technologies Founder & Executive Chairman Antony Jenkins discusses the challenges and opportunities facing banks, leadership, politics and his love of Miles Davis. Click here to listen to his podcast Q&A with Westpac Wire.</h6><br>\
		<a onclick='displaySpan(this)'><h5> — January 26, 2018?</h5>\
		<h5 id='one2'>Open banking – what is it and why does it matter</h5></a><br style='display:none'>\
		<h6>Open banking is now a reality. So what’s changing and what will the impact be for businesses and consumers?\
		<span style='display:none'>\
		Open banking is now a reality. Earlier this month, regulations came into force that will make it much easier for customers of UK banks to access better, cheaper and more personalised products from other providers. <br><br>\
		In 2016, a report from the government’s competition authority found that large banks weren’t having to compete very hard for customers, and that new providers were effectively being shut out of the market as a result. Because banks haven’t had to treat you well to keep you as a customer, the consequence has been expensive products and poor services. Those who have experienced punitive charges for overdrafts, or who were mis- sold PPI, are well aware of what it is like to be poorly served by the banks. <br><br>\
		So what’s changing? <br><br>\
		</span>\
		</h6><br>\
			<a><h5 id='one3'> — January 23, 2018</h5>\
		<h5>Making banking 10x better</h5></a>\
		<h6>10x Future Technologies Founder and Executive Chairman Antony Jenkins talks to Will Beeson, Creator and Host of Rebank – Banking the Future, in this podcast that looks at how 10x is transforming financial services through technology to make banking better for banks, their customers and society.Click here to listen to the podcast.</h6><br>\
			<a><h5> — January 09, 2018</h5>\
		<h5>The future of banking</h5></a>\
		<h6>Want to know more about how 10x Banking is helping banks and other businesses transform with customer- focused technology? Click here to see 10x’s Antony Jenkins discuss the future of banking and more with the Financial Times’ Banking Editor, Martin Arnold.FT on Air on Facebook.</h6><br>\
		",
		"color": "#63c0c6"
	},
	{
		"title": "",
		"desc": "\
		<a onclick='displaySpan(this)'><h5 id='two1'>Anti Modern Slavery Statement</h5></a><br>\
		<h6>This statement sets out 10x’s actions to understand all potential modern slavery risks related to its business and to put in place steps that are aimed at ensuring that there is no slavery or human trafficking in its own business and its supply chains.This statement relates to actions and activities during the financial year ending December 2017 <br><br>\
			<span style='display:none'>In keeping with our values of Integrity and Impact, at 10x we care about the world we live in and strive to make it better and we seek opportunities through our work to have a positive impact particularly for those less advantaged. As part of this we recognises that we have a responsibility to take a robust approach to slavery and human trafficking.<br><br>10x is absolutely committed to preventing slavery and human trafficking in our activities, and to ensuring that our partners and our supply chains are free from slavery and human trafficking. We require vendors and suppliers to maintain and promote fundamental human rights, where employment decisions are based on free choice without any coerced or prison labour, no use of physical punishment or threats of violence or other forms of physical, sexual, psychological or verbal abuse as a method of discipline or control.</span>\
		</h6><br>\
		<a onclick='displaySpan(this)'><h5 id='two2'>Diversity & Inclusion</h5></a><br>\
		<h6>At 10x, we are committed to promoting diversity and creating an inclusive culture.<br><br>\
			<span style='display:none'>Our business is about people. We live and operate in a diverse world and at 10x we are embracing the opportunity to ensure our organisation reflects this, both in people and thought. We strive to create an environment responsive to different cultures, groups and in all our interactions with our people, partners, customers, visitors, suppliers, contractors, investors and in the communities in which we operate.<br><br>We value diversity. Fundamentally we believe it is the right thing to do. We also believe it to be critical to our effectiveness, our business success and integral to achieving our strategic objective of being 10x better and 10x better company to work for.</span>	\
		</h6><br>\
		<a onclick='displaySpan(this)'><h5 id='two3'>Women in Finance Charter</h5></a><br>\
		<h6>10x has signed up to The Women in Finance Charter.<br><br>\
			<span style='display:none'>At 10x, we are committed to promoting diversity and creating an inclusive culture in an organisation that reflects the diverse world in which we live and operate.<br><br>We value diversity. Fundamentally we believe it is the right thing to do. We also believe it to be critical to our effectiveness, our business success and integral to achieving our strategic objective of being 10x better and 10x better company to work for.</span>	\
		</h6>\
		",
		"color": "#d1c4e9"
	}
]

$(window).on("load", function () {
	$("#loader").css("display", "none");
	$("#display-content").css("display","block");
});

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
function loadSideNav(index, dest) {
	$('#custom-sidenav').css("background-color", content[index].color)
	$('#custom-sidenav .title').text(content[index].title);
	$('#custom-sidenav .desc').html(content[index].desc);
	var elem = document.querySelector('#custom-sidenav');
	instance = M.Sidenav.init(elem, {"edge":"right"});
	instance.open();
	//$('#custom-sidenav').scrollTo($('#'+dest));
	$("#"+dest).get(0).scrollIntoView({'block':'center','inline':'center'});
}

function closenav() {
	instance.close();
}

function openUrl(url) {
	window.open("https://"+url, "_blank")
}

function displaySpan(el) {
	if ($(el).next().next().find("span").css("display") == 'none') $(el).next().next().find("span").css("display", "block");
	else $(el).next().next().find("span").css("display", "none")
}