<? /* Template Name: Contact */
 get_header('new'); the_post(); ?>

    <div id="title" class="contact">
        <div class="wrap">
            <h2><? the_title(); ?></h2>
<!--             <?= (get_field('subtitle') ? '<p>'.get_field('subtitle').'</p>'  : ''); ?> -->
        </div>
    </div>
    
    
    
<!--
    <? if(get_field('headline')): ?>
        <div id="subtitle">
            <div class="wrap">
                <h4><? the_field('headline') ?></h4>
            </div>
        </div>
    <? endif; ?>
    <div class="wrap">
        <article id="article" class="full">
            <? the_content(); ?>
        </article>
    </div>
-->


		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
		<script>
			var map;
			function initialize() {
			
				var mapOptions = {
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					mapTypeControl: false,
					zoom: 16,
					zoomControl: false,
					panControl: false,
					streetViewControl: false,
					scaleControl: false,
					overviewMapControl: false,
					center: new google.maps.LatLng(42.359566, -71.06018899999998)
				};
				
				map = new google.maps.Map(document.getElementById('map-canvas'),
					mapOptions);
				
				var mapStyles = [
					{
						"featureType": "landscape",
						"stylers": [
							{ "visibility": "on" }
						]
					},{
						"featureType": "water",
						"stylers": [
							{ "visibility": "on" }
						]
					},{
						"featureType": "water",
						"elementType": "labels",
						"stylers": [
							{ "visibility": "on" }
						]
					},{
						"featureType": "administrative",
						"stylers": [
							{ "visibility": "on" }
						]
					},{
						"featureType": "administrative",
						"elementType": "labels",
						"stylers": [
							{ "visibility": "on" }
						]
					},{
						"featureType": "poi",
						"stylers": [
							{ "visibility": "on" }
						]
					},{
						"featureType": "road",
						"stylers": [
							{ "visibility": "on" }
						]
					},{
						"featureType": "transit",
						"stylers": [
							{ "visibility": "on" }
						]
					}
				];
				
				map.setOptions({styles: mapStyles});
				
				var icon = {
					path: 'M16.5,33c-9.0818,0-16.5-7.119-16.5-16.327,0-9.2082,7.3873-16.673,16.5-16.673,9.113,0,16.5,7.4648,16.5,16.673,0,9.208-7.418,16.327-16.5,16.327zm0-9.462c3.7523,0,6.7941-3.0737,6.7941-6.8654,0-3.7916-3.0418-6.8654-6.7941-6.8654s-6.7941,3.0737-6.7941,6.8654c0,3.7916,3.0418,6.8654,6.7941,6.8654z',
					anchor: new google.maps.Point(16.5, 16.5),
					fillColor: '#FF7700',
					fillOpacity: 1,
					strokeWeight: 8,
					strokeColor: '#FF7700',
					strokeOpacity: 1,
					scale: 0.66
				};
				
				var marker = new google.maps.Marker({
					position: new google.maps.LatLng(42.359566, -71.06018899999998),
					map: map,
					icon: icon,
					title: 'marker',
					url: 'https://www.google.com/maps/place/2+Center+Plz+%23700,+Boston,+MA+02108'
				});

    			google.maps.event.addListener(marker, 'click', function() {
                    window.location.href = marker.url;
                });

			}
			
			google.maps.event.addDomListener(window, 'load', initialize);
			
		</script>

        
        <div id="map-canvas" style="width:100%; height:460px;"></div>
        
        <div class="wrap contact">
            <div id="orange" class="clearfix">
                <h3>Corporate Office</h3>
                <p class="left">
                    <? echo strip_tags(get_field('address'), '<a><br><br/><strong><b>') ?>
                </p>
                <p class="right">
                    <? echo strip_tags(get_field('phones-email'), '<a><br><br/><strong><b>') ?>
                </p>
            </div>
            <div id="parking">
                <div class="left clearfix">
                    <? the_field('parking_left') ?>
                </div>
                <div class="right clearfix">
                    <? the_field('parking_right') ?>
                </div>
            </div>
        </div>

    
<? get_footer('new'); ?>