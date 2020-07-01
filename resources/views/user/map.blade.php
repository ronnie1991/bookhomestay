<!DOCTYPE html>
<html>
  <head>
    <title>Custom Markers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
   @php
   $results = DB::table('properties')->where('confort_id',2)->get(); 
   foreach ($results as $result) { 
         $locations[]=array( 'lat'=>$result->latitude, 'lng'=>$result->longitude );
         $markers = json_encode( $locations );
         
      }  
   @endphp

  <body>
    <div id="map"></div>
    
    <script>
      var map;
      function initMap() {
        <?php echo "var markers=$markers;\n";      ?>
        var uluru = {lat: -25.363, lng: 131.044};

        var latlng = new google.maps.LatLng(20.5937, 78.9629);

        var myOptions = {
                zoom: 10,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: false
            };

        var map = new google.maps.Map(document.getElementById('map'), {
           zoom: 5,
           center: latlng
        });

        var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/info-i_maps.png';

        var contentString = '<div id="content">'+
              '<div id="siteNotice">'+
              '</div>'+
              '<h1 id="firstHeading" class="firstHeading">Testing</h1>'+
              '<div id="bodyContent">'+
              '<p><b>Uluru</b>, also referred to as <b>Tushar Subhra</b>, is a large ' +
              'sandstone rock formation in the southern part of the '+
              'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
              'south west of the nearest large town, Alice Springs; 450&#160;km '+
              '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
              'features of the Uluru - Kata Tjuta National Park. Uluru is '+
              'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
              'Aboriginal people of the area. It has many springs, waterholes, '+
              'rock caves and ancient paintings. Uluru is listed as a World '+
              'Heritage Site.</p>'+              
              '</div>'+
              '</div>';

          var infowindow = new google.maps.InfoWindow({
            content: contentString
          });

            for( var o in markers ) {

                lat = markers[o].lat;
                lng = markers[o].lng; 

                marker = new google.maps.Marker({
                   position: new google.maps.LatLng(lat,lng),
                   icon: "http://maps.google.com/mapfiles/ms/icons/red-dot.png",
                   map: map,
                   title: '123456(Ayers Rock)'
                }); 

                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                  });                                 
                
            }

            // marker = new google.maps.Marker({
            //    position: new google.maps.LatLng(-33.91721, 151.22630),
            //    icon: iconBase,
            //    map: map,
            //    title: '123456(Ayers Rock)'
            // }); 

            // marker.addListener('click', function() {
            //     infowindow.open(map, marker);
            //   });        
      }

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDT_LmCgQrsLKDjs3zQGU2ZWHgVr6j9Npg&callback=initMap">
    </script>
  </body>
</html>