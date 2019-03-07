(function ($) {
  js = {
    init: function() {
	    
		$(window).load(js.reSizing);
		$(window).resize(js.reSizing);
		
		$('.partner-container a').on('click',function(e){
			e.preventDefault();
			var that = $(this),
				logo = that.attr('href').slice(1);
			if(that.hasClass('active')){
				that.removeClass('active');
			} else {
				$('.partner-container a').removeClass('active');
				that.addClass('active');
				$('#success-stories .'+logo).fadeOut(200,function(){
					$(this).insertBefore($('.block-success:eq(0)')).fadeIn(600);
				});
			}
		})
		
	},
	reSizing: function(){
		var wWi = $(window).width();
		if(wWi>610){
			$('.block-success').removeAttr('style').delay(50).setAllToMaxHeight();
		} else {
			$('.block-success').removeAttr('style');
		}
	}
  }
  
	jQuery.fn.setAllToMaxHeight = function(){
		return this.height( Math.max.apply(this, jQuery.map( this , function(e){ return jQuery(e).height() }) ) );
	}

})(jQuery);

jQuery(document).ready(function() { 
	js.init();
});

(function($) {
	
function new_map( $el ) {

	var $markers = $el.find('.marker');
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
   	
	var map = new google.maps.Map( $el[0], args);
	
	map.markers = [];
	$markers.each(function(){
    	add_marker( $(this), map );
	});
	center_map( map );
	
	return map;
	
}

function add_marker( $marker, map ) {
	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );
	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() ) {
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});
		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {
			infowindow.open( map, marker );
		});
	}
}

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){
		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
		bounds.extend( latlng );
	});

	// only 1 marker?
	if( map.markers.length == 1 ) {
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 14 );
	} else {
		// fit to bounds
		map.fitBounds( bounds );
	}

}

// global var
var map = null;

$(document).ready(function(){

	$('.acf-map').each(function(){
		// create map
		map = new_map( $(this) );
	});

});

})(jQuery);