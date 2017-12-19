// 2. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;
function onYouTubeIframeAPIReady() {
	console.log(); 
	player = new YT.Player('player', {
		height: $('#heightTry').height(),
		width: '100%',
		videoId: 'RXYpbxSsW1E',
		events: {
			'onReady': onPlayerReady,
			'onStateChange': onPlayerStateChange
		}
	});
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
	event.target.stopVideo();
	
}

// 5. The API calls this function when the player's state changes.
//    The function indicates that when playing a video (state=1),
//    the player should play for six seconds and then stop.
var done = false;
function onPlayerStateChange(event) {
	if (event.data == YT.PlayerState.PLAYING && !done) {
		$('.myCarousel-control, .aspire-carousel-caption, #myCarousel .carousel-indicators').hide();
		$('#myCarousel').carousel('pause');
	}
	if ((player.getPlayerState()==2 || player.getPlayerState()==0) && !done) {
		$('.myCarousel-control, .aspire-carousel-caption, #myCarousel .carousel-indicators').show();
		$('#myCarousel').carousel('cycle');
	}
}
function stopVideo() {
	player.stopVideo();
}