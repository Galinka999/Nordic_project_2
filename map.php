<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>

    <script>
     

      let map;

      function initMap() {
             var uluru = {lat: 57.344, lng:36.036};  
             

			// The map, centered at Uluru
			var map = new google.maps.Map(
                document.getElementById('map'),
                {zoom: 4, center: uluru}
            );
            
			// The marker, positioned at Uluru
            var marker = new google.maps.Marker({position: uluru, map: map});
            
            var marker1 = new google.maps.Marker({position: {lat: 57.244, lng:36.036}, map: map});
      }

 
    </script>
  </head>
  <body>
    <div id="map"></div>
  </body>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwbktBM3GY5GfsT0VfA1MGEobYqkvrSkc&amp;callback=initMap" async="" defer="">  </script>
</html>