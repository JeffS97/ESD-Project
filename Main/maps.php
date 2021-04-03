<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!-- jsFiddle will insert css and js -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" 
    crossorigin="anonymous">
 
    <!-- Latest compiled and minified JavaScript -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script 
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
    
    <script 
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
  </head>
  <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
#map {
  height: 100%;
}

p {
    margin-bottom: 8px;
}

/* Optional: Makes the sample page fill the window. */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}

.custom-map-control-button {
  appearance: button;
  background-color: #fff;
  border: 0;
  border-radius: 2px;
  box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
  cursor: pointer;
  margin: 10px;
  padding: 0 0.5em;
  height: 40px;
  font: 400 18px Roboto, Arial, sans-serif;
  overflow: hidden;
}
.custom-map-control-button:hover {
  background: #ebebeb;
}
  </style>
  <body>
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1iSJyi8nOzkGwMWsmrEDQstq6b22-XoI&libraries=&v=weekly" async></script>
  </body>
</html>
<script>
let map, infoWindow;

$(async () => {
        // graphQL endpoint
        var serviceURL = 'http://localhost:8080/v1/graphql';

        // graphQL query
        var query = `{
            clinics {
                x
                y
                gid
                clinic_name
                tel_no
                postal_cd
                blk_hse_no
                floor_no
                unit_no
                street_name
            }
        }`
        
        try {
            const response =
                await fetch( 
                    serviceURL, {
                        method: 'POST',
                        headers: {"Content-Type": "application/json"},
                        body: JSON.stringify({
                            query
                        })
                    });

            const result = await response.json(); // resolves promise of fetch and parses the response data as a JSON object (if the result was written in JSON format, if not it raises an error)
            // awaiting its promised response. On completion of fetch, the response is triggered and this part of the code waiting for it will be executed. 
            
            if (response.status === 200){
                // success case
                var clinics = result.data.clinics;
                console.log(clinics)

                initMap();

                var infowindow = new google.maps.InfoWindow();
                var marker, i;

                // getDistance('103.83', '1.43', '103.8559671', '1.367479014')

                for (const clinic of clinics) {  
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(clinic.y, clinic.x),
                    map: map
                });

                // getDistance('103.83', '1.43', clinic.x, clinic.y);

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                    infowindow.setContent(`<h6>` + clinic.clinic_name + `</h6>
                        <p>Address: BLK ` + clinic.blk_hse_no + `, ` + clinic.street_name + `</p>` +
                        `<p>Postal Code: ` + clinic.postal_cd + `</p>` + 
                        `<p>Unit: #` + clinic.floor_no + `-` + clinic.unit_no + `</p>` + 
                        `<p>Tel: ` + clinic.tel_no + `</p>` +
                        `<button style="margin-top: 5px" class="btn btn-danger btn-sm" value="` + clinic.gid + `" onclick='createAppointment(this.value)'>Make a booking</button>` + `
                        <button style="margin-top: 5px" class="btn btn-danger btn-sm" onclick=getDistance(` + clinic.x + "," + clinic.y + `)>Calculate distance</button>`
                    );
                    infowindow.open(map, marker);
                    }
                    })(marker, i));
                }
            } 
            else if (response.status == 404) {
                // No clinics
                console.log(response.status);
            } 
            else {
                // unexpected outcome, throw the error
                throw response.status;
            }
            
        } 
        catch (error) {
            // Errors when calling the service; such as network error, 
            // service offline, etc
            console.log(error);
        } // error
    });

function createAppointment(gid){
    window.location.href = 'createAppointment.php?gid=' + gid;
}

function getDistance(end_x, end_y){
    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer();
    
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
        };
        
        var start = pos.lat + ", " + pos.lng;
        var end = end_y + ", " + end_x;
        // console.log(start);
        
        directionsService.route(
            {
            origin: {
                query: start,
            },
            destination: {
                query: end,
            },
            travelMode: google.maps.TravelMode.DRIVING,
            },
            (response, status) => {
            if (status === "OK") {
                var directionsData = response.routes[0].legs[0];
                console.log(directionsData.distance.text);
                // document.getElementById("durationData").innerHTML = 'The Hero is approximately:</br> <h1>' + directionsData.duration.text + "</h1></br> away from the booker!";
                directionsRenderer.setDirections(response);
            } else {
                // document.getElementById("durationData").innerHTML = "<h1> Unable to compute travel time and route due to incorrect address format. <br> Rest assured! your hero is still on his way. </h1>";
                window.alert("Directions request failed due to " + status);
            }
            }
        );
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
}

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: { lat: 1.3987769644458394, lng: 103.81887771864776},
    })
    infoWindow = new google.maps.InfoWindow();
    const locationButton = document.createElement("button");
    locationButton.textContent = "Pan to Current Location";
    locationButton.classList.add("custom-map-control-button");
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);;
    
    locationButton.addEventListener("click", () => {
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
        //   infoWindow.setPosition(pos);
        //   infoWindow.setContent("Location found.");
        //   infoWindow.open(map);
          map.setCenter(pos);
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  });
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation."
  );
  infoWindow.open(map);
}

</script>