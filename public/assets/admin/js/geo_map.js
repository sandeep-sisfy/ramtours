$(function() {

	$("#formatted_address").geocomplete({
          map: ".gmap",
          zoom:10,
          details: "form",
          markerOptions: {
            draggable: true
          },
          location:[ $('#lat').val(), $('#lng').val()]
        }); 
   
        $("#pm_add_property_gmap").bind("geocode:dragged", function(event, latLng, data){
          getAddress(latLng.lat(), latLng.lng())
          
        });
        
        
         function getAddress(lat, lng) {
            var latlng = new google.maps.LatLng(lat, lng);
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                       $('#formatted_address').val(results[0].formatted_address);
                       $("input[name=lat]").val(lat);
                       $("input[name=lng]").val(lng);
                    }
                }
            });
        }

});

 function initMap(){
     var myLatLng = {lat: $("input[name=lat]").val(lat), lng: $("input[name=lng]").val(lng)};
        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 4
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
          map: map,
          position: myLatLng,
          title: 'Hello World!'
        });
  }