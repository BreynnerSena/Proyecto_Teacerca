

<!--------------------->


    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcThllYK4h_5A6qPw-z4iFinePf3GRVQc&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        position: absolute;
            top: 140px;
            left: -174px;
            height: calc(60vh - 50px);
            width: calc(50vw - 50px);
            z-index: 0;
            overflow: hidden;
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
      "use strict";

      let map;

      function initMap() {
        // map = new google.maps.Map(document.getElementById("map"), {
        //   center: {
        //     lat:,
        //     lng: 
        //   },
        //   zoom: 20
        // });

        var myLatLng = {lat: <?php echo $latitud; ?>, lng: <?php echo $longitud; ?>};

var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 20,
  center: myLatLng
});

var marker = new google.maps.Marker({
  position: myLatLng,
  map: map,
  title: 'Hello World!'
});



        
      }
    </script>
    <div class="modal fade" id="staticBackdrop">
  <div class="modal-dialog">
   
  
      
          <div id="map"></div>
      
    
  </div>
</div>

      
      
