jQuery(document).ready(function(){
	
	var mapInfoWindow = null;
	var buildMaps = null;
	var addClicker = null;
	
	// add clicker to map
	addClicker = function(map, marker, content){
		google.maps.event.addListener(marker, 'click', function(){
			if (mapInfoWindow) { mapInfoWindow.close(); }
			mapInfoWindow = new google.maps.InfoWindow({ content: content });
			mapInfoWindow.open(map, marker);
		});
	};
	
	// build styled maps
	buildMaps = function(){
		if (typeof CSPPStyledGMaps !== 'undefined'){
			for (var i in CSPPStyledGMaps){
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
				var hasMarker = false;
				jQuery.each(maprow.markers, function(i, markerrow){
					var markerlat = parseFloat(markerrow.lat);
					var markerlng = parseFloat(markerrow.lng);
					if (markerrow.lat !== 0 || markerrow.lng !== 0) {
						hasMarker = true;
						var markerOpts = {
							position: new google.maps.LatLng(markerlat, markerlng),
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
							var clicker = addClicker(map, marker, markerrow.markerInfo);
						}
					}
				});
				var defaultZoom = parseInt(maprow.zoom);
				google.maps.event.addListenerOnce(map, 'bounds_changed', function(event) {
					if (this.getZoom() > defaultZoom) {
						this.setZoom(defaultZoom);
					}
				});
				if (hasMarker) map.fitBounds(bounds);
			}
		}	
	};
	buildMaps();
	
});