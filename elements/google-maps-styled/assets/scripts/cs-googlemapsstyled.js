// set up arrow for maps to load
var CSPPStyledGMaps = [];

// add map params to list
function CSPPAddStyledGMaps(mapdata){
	CSPPStyledGMaps.push(mapdata);
}

// add clicker to map
function CSPPAddClicker(map, marker, content){
	google.maps.event.addListener(marker, 'click', function(){
		if (infowindow) { infowindow.close(); }
		infowindow = new google.maps.InfoWindow({ content: content });
		infowindow.open(map, marker);
	});
}

// build styled maps
function CSPPBuildStyledGMaps(){
	for (var i=0; i<CSPPStyledGMaps.length; i++){
		var maprow = CSPPStyledGMaps[i];
		var mapOpts = { 
			zoom: parseInt(maprow.zoom),
			center: {lat: parseFloat(maprow.lat), lng: parseFloat(maprow.lng)},
			zoomControl: maprow.zoomControl,
			draggable: maprow.drag
		};
		if (maprow.map_style_json) mapOpts.styles = maprow.map_style_json;
		if (maprow.zoomLock){
			mapOpts.draggable = false;
			mapOpts.scrollwheel = false;
		}
		map = new google.maps.Map(document.getElementById('cspp-gmap-'+maprow.counter+'-canvas'), mapOpts);
		if (maprow.zoomLock){
			google.maps.event.addListener(map, 'click', function(event){
	      this.setOptions({ draggable: true, scrollwheel: true });
	    });
	    google.maps.event.addListener(map, 'mouseout', function(event){
	      this.setOptions({ draggable: false, scrollwheel: false });
	    });
    }
		var bounds = new google.maps.LatLngBounds();
		jQuery.each(maprow.markers, function(i, markerrow){
			var markerOpts = {
				position: new google.maps.LatLng(parseFloat(markerrow.lat), parseFloat(markerrow.lng)),
				map: map
			};
			if (markerrow.title){
				markerOpts.title = markerrow.title;
			}
			if (markerrow.image){
				markerOpts.icon = markerrow.image;
			}
			var marker = new google.maps.Marker(markerOpts);
			bounds.extend(marker.getPosition());
			if (markerrow.markerInfo){
				var clicker = CSPPAddClicker(map, marker, markerrow.markerInfo);
			}
		});
		
		var defaultZoom = parseInt(maprow.zoom);
		google.maps.event.addListenerOnce(map, 'bounds_changed', function(event) {
			if (this.getZoom() > defaultZoom) {
				this.setZoom(defaultZoom);
			}
		});
		map.fitBounds(bounds);
	}
};
