var vrView;
var panos = [
	{ type: "image", media: "pano1" },
	{ type: "video", media: "pano6" },
	{ type: "image", media: "pano5" },
	{ type: "image", media: "pano4" },
	{ type: "image", media: "pano3" },
	{ type: "image", media: "pano2" }
]
var i=0;
const hotspot = {
	left: {
		pitch: 0,
		yaw: 20,
		radius: 0.05,
		distance: 1
	},
	right: {
		pitch: 0,
		yaw: 340,
		radius: 0.05,
		distance: 1
	}
}
// All the scenes for the experience
var scenes = {
	pano1: {
		image: 'pano1.jpg',
		hotspots: hotspot
	}
};

function onLoad() {
	vrView = new VRView.Player('#vrview', {
		image: 'blank.png',
		preview: 'blank.png',
		is_autopan_off: true
	});
	
	vrView.on('ready', onVRViewReady);
	vrView.on('modechange', onModeChange);
	vrView.on('click', onHotspotClick);
	vrView.on('error', onVRViewError);
	//vrView.on('getposition', onGetPosition);
}

function onVRViewReady(e) {
	loadScene(panos[i].media, i);
}

function onModeChange(e) {
	//console.log('onModeChange', e.mode);
}

function onHotspotClick(e) {
	//console.log('onHotspotClick', e.id);
	if (e.id == "left") {
		--i;
		if (i<0) i=panos.length-1;
		loadScene(panos[i].media, i);
	} 
	if (e.id == "right") {
		++i;
		if (i >= panos.length) i = 0;		
		loadScene(panos[i].media, i);		
	}
}

function loadScene(id, i) {
	//console.log('loadScene', panos[i]);
	// Set the media
	if (panos[i].type == "image") {
		vrView.setContent({
			image: panos[i].media + ".jpg",
			is_autopan_off: true
		});
	} else {
		vrView.setContent({
			video: panos[i].media + ".webm",
			is_autopan_off: true
		});
	}
	
	// Add all the hotspots for the scene
	var sceneHotspots = Object.keys(hotspot);
	for (var i = 0; i < sceneHotspots.length; i++) {
		var hotspotKey = sceneHotspots[i];
		vrView.addHotspot(hotspotKey, hotspot[hotspotKey]);
	}
}

function onVRViewError(e) {
	console.log('Error! %s', e.message);
}

window.addEventListener('load', onLoad);
