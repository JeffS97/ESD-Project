<!DOCTYPE html>
<?php
    spl_autoload_register(function($class){
        require_once "../model/$class.php";
    });
session_start();

    $id=$_GET["id"];
    
    $dao = new gigDetailsDAO();

    $gigArray = $dao->viewBooking($id);
  //  echo $gigArray[0]->getDescription();

   
 
?>
<head>
<meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <!--Open Sans Regular-->
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
     <!--Montserrat-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> 
    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 200px;  /* The height is 400 pixels */
            width: 120%; 
            margin-top:75%;
            
          
             /* The width is the width of the web page */
        }
            /* Optional: Makes the sample page fill the window. */
            .logo{
          font-family: 'Open Sans', sans-serif;
          font-weight: bolder;
        } 
        
       
        
        body {
            font-family: 'Montserrat', sans-serif;
            font-size: 23px;
        }
        
       
        
       
        
        p {
            font-size: 20px;
            text-align: center;
        }
        
       
        
        
        
     
        .sublayout {
    color: #9B9B9B;
    background: #F1F1F1;
    font-size: 15px;
    margin: 5px;
    padding: 2px 5px;
    border-radius: 5px;
    display: inline-block;
}
     
        
    
        

        .btn-info {
          font-size: 20px;
          color: white;
          letter-spacing: 1px;
          line-height: 15px;
          border: 2px solid ;
          border-radius: 30px;
          padding: 15px;
          margin-left:85%;
          position:sticky;
          width:150px;
          
        }
        h1 {
    margin-top: 10px;
    color: #6c6c6c;
    display: inline-block;
    font-size: 30px;
    font-weight: bold;
    
}

        .dropdown-menu{
            /* Stay in place */
            
            z-index: 1000; /* Stay on top */
           
            /* Stay at the top */
        }
        .nav-item{
            padding-left: 20px;
            padding-right: 20px;
        }
        .track {
    width:150%;
     background-color: #ddd;
     height: 7px;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     margin-bottom: 60px;
     margin-top: 50px
 }

 .track .step {
     -webkit-box-flex: 1;
     -ms-flex-positive: 1;
     flex-grow: 1;
     width: 10%;
     margin-top: -18px;
     text-align: center;
     position: relative
 }

 .track .step.active:before {
     background: #FF5722
 }

 .track .step::before {
     height: 7px;
     position: absolute;
     content: "";
     width: 100%;
     left: 0;
     top: 18px
 }

 .track .step.active .icon {
     background: #ee5435;
     color: #fff
 }

 .track .icon {
     display: inline-block;
     width: 40px;
     height: 40px;
     line-height: 40px;
     position: relative;
     border-radius: 100%;
     background: #ddd
 }

 .track .step.active .text {
     font-weight: 400;
     color: #000
 }

 .track .text {
     display: block;
     margin-top: 7px;
     font-size:16px;
 }
 #myImg {
  border-radius: 20px;
  cursor: pointer;
  transition: 0.3s;
  height:600px;
  width:600px;
}

#myImg:hover {opacity: 0.7;}


.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}


.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}


.category {
  display: inline-block;
 
  margin:5px;
  padding: 0 25px;
  height: 50px;
  font-size: 16px;
  line-height: 50px;
  border-radius: 25px;
  
}

.category img {
  float: left;
  margin: 0 10px 0 -25px;
  height: 50px;
  width: 50px;
  border-radius: 50%;
}

.modal-content, #caption {  
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform: scale(0.1)} 
  to {transform: scale(1)}
}


.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}


@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
@import url('https://fonts.googleapis.com/css?family=Oswald');





.grid {
 
 margin-left: -40px;
}

.gc {
 box-sizing: border-box;
 display: inline-block;
 margin-right: -.25em;
 min-height: 1px;
 padding-left: 40px;
 vertical-align: top;
}

.first {
 width: 33.33333%;
}

.second {
 width: 66.66666%;
}

.viewdetails {
 position: relative;
 max-width: 900px;
 margin: 10px auto 0;
}

.viewdetails .menu div {
 padding: 15px 20px 15px 40px;
 margin-bottom: 10px;

 box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
 cursor: pointer;
 position: relative;
 vertical-align: middle;
 font-weight: 700;
 transition: 1s all cubic-bezier(0.075, 0.82, 0.165, 1);
}

.viewdetails .menu div:hover {
 box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.viewdetails .menu div span.light {
    
 height: 10px;
 width: 10px;
 
 position: absolute;
 top: 24px;
 left: 15px;

 border-radius: 100%;
 transition: 1s all cubic-bezier(0.075, 0.82, 0.165, 1);
}

.viewdetails .menu div.active span.light {
 
 left: 0;
 height: 100%;
 width: 3px;
 top: 0;
 border-radius: 0;
}

.viewdetails .menu div.active {
 color: $third-color;
 padding: 15px 20px 15px 20px;
}

ul.nacc {
 position: relative;
 height: 0px;
 list-style: none;
 margin: 0;
 padding: 0;
 transition: .5s all cubic-bezier(0.075, 0.82, 0.165, 1);
}

ul.nacc li {
 opacity: 0;
 transform: translateX(50px);
 position: absolute;
 list-style: none;
 transition: 1s all cubic-bezier(0.075, 0.82, 0.165, 1);
}

ul.nacc li.active {
 transition-delay: .3s;
 z-index: 2;
 opacity: 1;
 transform: translateX(0px);
}

ul.nacc li p {
 margin: 0;
}
      </style>
</head>
<body>
<div class = "animate__animated animate__fadeInDown">

       
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:white; padding: 12px;">
            <div class = 'container' style="padding: 0;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <span class = 'logo' style="padding: 10px; font-size: 25px; padding-bottom: 5px;" ><img src = "https://www.flaticon.com/svg/static/icons/svg/1624/1624453.svg" height = 40px width = 40px> PROJECT HERO</span>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav" style="margin: auto;">
                    <li class="nav-item active">
                        <a class="nav-link" href="../Homepage.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Task
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../views/book2.php">Browse</a>
                        <a class="dropdown-item" href="../views/Booktask.php">Post</a>
                        </div>
                    </li>
                   
                    <li class="nav-item dropdown">
                    <a class="nav-link" href="../views/leaderdisplay.php">Top Heroes </a>
                    </li>
                    <?php
            
              
            if(isset($_SESSION["email"])){
           ?>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profile
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../views/History.php">History</a>
                        <a class="dropdown-item" href="../views/Profile v2.php">Settings</a>
                        
                        </div>
                    </li> 
                  <li>  <button type='button'  class='btn btn-info'  ><a href='../Main/process_logout.php' style='color: white;text-decoration: none;'>Log Out</a></button></li>
                    <?php }else{?>
                        
                   
                    <!-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="background-color: transparent;">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </form> -->
                    
                <button type="button"  class="btn btn-info" ><a href="./views/Signup.php" style="color: white;text-decoration: none;">Join Us</a></button>
                    <?php }?>  
                           <!-- <button type="button" class="btn btn-primary" style="margin: 10px;">Sign Up</button> -->
                    <span class = 'noti' style="padding: 10px; font-size: 25px; padding-bottom: 15px;" hidden><img src = "https://www.flaticon.com/svg/static/icons/svg/523/523152.svg" height = 35px width = 35px> </span>
                </div>
             </ul>  
            </div>
        
            </nav>
<div class="container">
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12">

        <p style="margin-right:80%" class="lead mt-3">3 Easy Steps...</p>
    <div class="track" >
                <div class="step active"> <span class="icon"> <i class="fa fa-eye"></i> </span> <span class="text">View Service Request</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-address-card"></i> </span> <span class="text"> Enter Your Current Location</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Accept Request and Be a Hero </span> </div>

            </div>
    
<h1 id="taskName"><?php echo $gigArray[0]->getGigName() ?></h1>
<br>
<div class="category bg-light" >
<?php
if($gigArray[0]->getCategoryName()=="home"){
echo  '<img src="../resources/images/plumber.jpg" alt="Person" width="96" height="96">';
}
elseif($gigArray[0]->getCategoryName()=="vehicleHelp"){
    echo  '<img src="../resources/images/vehicle.jpg" alt="Person" width="96" height="96">';
    }
elseif($gigArray[0]->getCategoryName()=="food"){
        echo  '<img src="../resources/images/food.jpg" alt="Person" width="96" height="96">';
        }
elseif($gigArray[0]->getCategoryName()=="shopping"){
            echo  '<img src="../resources/images/shopping.jpg" alt="Person" width="96" height="96">';
            }
elseif($gigArray[0]->getCategoryName()=="miscellaneous"){
                echo  '<img src="../resources/images/misc.jpg" alt="Person" width="96" height="96">';
                }

?>
 
  <?php echo  $gigArray[0]->getCategoryName() ?>
</div>
<img id="myImg" style="margin-top:10px" src="../resources/gigImages/<?php echo $gigArray[0]->getId()?>.jpg" alt=""  >
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<br>

<div class="text-center  " style="margin-bottom:-10px;margin-top:80px;font-family: 'Open Sans', sans-serif;height:100px;font-size:45px;">Task Details</div>
<div class="viewdetails" style="padding:20px;">

  <div class="grid">
   <div class="gc first">
    <div class="menu">
     <div class="active " ><span class="light"></span><span style=" font-family: 'Open Sans', sans-serif;
  text-transform: uppercase; font-size: .6em;">Description</span></div>
     <div class=" "><span class="light" ></span><span  style=" font-family: 'Open Sans', sans-serif;
  text-transform: uppercase; font-size: .6em;">Fee</span></div>
     <div class=" "><span class="light"></span><span  style=" font-family: 'Open Sans', sans-serif;
  text-transform: uppercase; font-size: .6em;">Address</span></div>
    </div>
   </div>
   <div class="gc second">
    <ul class="nacc">
     <li class="active">
      <div>
       <p > <?php echo  $gigArray[0]->getDescription() ?></p>
      </div>
     </li>
     <li>
      <div>
       <p>$<?php echo  $gigArray[0]->getGigPrice() ?>-Payment by Cash or Paylah</p>
      </div>
     </li>
     <li>
      <div>
       <p>Postal Code:<?php echo  $gigArray[0]->getbookeraddress() ?></p>
      </div>
     </li>
    </ul>
   </div>
  </div>
 </div>


</div>

    
    

 


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <div class="col-lg-4 col-md-4 col-sm-12">
    <div id="map"></div>
    <script>
        // Initialize and add the map
        function initMap() {
            // default: The location of SIS, SMU
            var lat = parseFloat(document.getElementById("lat").value);
            var lng = parseFloat(document.getElementById("lng").value);
            // var uluru = {lat: -25.344, lng: 131.036};
            var loc = {lat: lat, lng: lng};

            // The map, centered at SIS, SMU
            var map = new google.maps.Map(
                // play with the zoom value to zoom in or out
                document.getElementById('map'), {zoom: 14, center: loc});
            // The marker, positioned at SIS, SMU
            var marker = new google.maps.Marker({position: loc, map: map});
        }
    </script>
    
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key 
    * The callback parameter executes the initMap() function
    -->
  <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1iSJyi8nOzkGwMWsmrEDQstq6b22-XoI&callback=initMap">
    </script>  
 
<div class="jumbotron" style="width:120%;">          
   
    <form>
        <div class="form-group">
            <label for="addr">Enter Your Current Location:</label>
            <input type="text" class="form-control" name="addr" id="addr" placeholder="E.g. Singapore Management University" >
            
            <button type="button"  onclick="getLoc('postcode')" class="btn btn-primary mt-2" >Get Postal Code!</button>
          
            <!-- the following set the lat, lng values to put a marker on the map-->
            <input type="hidden" id="lat" name="lat" value="1.2973784" />
            <input type="hidden" id="lng" name="lng" value="103.8495219" />
        </div>
        <p id="display" class="lead text-center"></p>   
    </form>
    <form action="./acceptbooking.php" method="POST">
        <div class="form-group">
        <br>
        <label >Postal:</label>
        <input type="text" value="" name="field" class="form-control" id="field" >
<input type="hidden" value="<?php echo  $gigArray[0]->getId() ?>" name="id">
        </div>
        <input type="submit" onclick="validates()"  class="btn btn-block btn-warning statusBtn"  value="Accept Booking"></input>
    </form>
   
</div>
</div>

</div>
</div>
<script>
var modal = document.getElementById('myModal');


var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

var span = document.getElementsByClassName("close")[0];

$(document).on("click", ".viewdetails .menu div", function() {
	var number = $(this).index();

	if (!$(this).is("active")) {
		$(".viewdetails .menu div").removeClass("active");
		$(".viewdetails ul li").removeClass("active");

		$(this).addClass("active");
		$(".viewdetails ul").find("li:eq(" + number + ")").addClass("active");

		var listItem = $(".viewdetails ul")
			.find("li:eq(" + number + ")")
			.innerHeight();
		$(".viewdetails ul").height(listItem + "px");
	}
});
span.onclick = function() { 
  modal.style.display = "none";
}
    
     function validates(){
    if(document.getElementById('field').value==""){
        document.getElementById("error").innerHTML=`<div class="alert alert-danger" role="alert">
  Enter Your Current Location
</div>`;
        event.preventDefault();
    }
    
}
    // Ajax call
    function getLoc(action) {
        var addr = encodeURI(document.getElementById("addr").value);
        console.log(addr);
        var url = "https://maps.googleapis.com/maps/api/geocode/json?address=" + addr + "&key=AIzaSyA1iSJyi8nOzkGwMWsmrEDQstq6b22-XoI";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // following code may throw error if user input is invalid address
                // so we use try-catch block to handle errors
                try { 
                    // expected response is JSON data
                    var data = JSON.parse(this.responseText);
                    console.log(data);

                    var info = '';
                    if (action == 'postcode') {
                        // display postal code, given an address
                        info = getPostCode(data);
                    } 
                   
                    
                    document.getElementById("field").value = info;
                    // refresh the hidden input values with new lat lng coordinates
                    var coordinate = getLatLng(data);
                    document.getElementById("lat").value = coordinate["lat"];
                    document.getElementById("lng").value = coordinate["lng"];
                    // now refresh the map
                    initMap();
                } catch(err) { // show error message
                    // not a good idea to directly show err.message 
                    // as it may contain sensitive info
                    // document.getElementById("display").innerHTML = err.message;

                    // show a predefined error message string
                    document.getElementById("display").innerHTML = "Sorry, invalid address. Please try again!";
                }
            }
        };
        
        xhttp.open("GET", url, true);
        xhttp.send();
    }

    function getFullAddress (data) {
        var addr = data["results"][0]["formatted_address"];
        var loc = getLatLng(data);
        return addr + "<br> lat: " ;
    }

    function getLatLng(data) {
        var location= data["results"][0]["geometry"]["location"];
        return location; 
    }
    

    function getPostCode(data) {
        var addrcomponents = data["results"][0]["address_components"];
        var postcode = addrcomponents.filter(postcodeHelper);
        // country is an array but there should be only one element
        return postcode[0]["long_name"];
    }

    function postcodeHelper(addr) {  
        return addr["types"][0] == "postal_code" ;
    }


    function getKeys(data){
        // data["results"][0] is an object
        // this gets the keys/properties of results[0] object
        var keys = Object.keys(data["results"][0]);
        for (key of keys) {
            // this prints --
            /*  address_components
                formatted_address
                geometry
                place_id
                plus_code
                types */
            document.getElementById("display").innerHTML += key + "<br>";
        }
    }
   
    function getCountry(data) {
        // this is an array
        var addrcomponents = data["results"][0]["address_components"];
        // The filter() method creates a new array with array elements that passes a test.
        var country = addrcomponents.filter(countryHelper);
        // country is an array but there should be only one element
        return country[0]["long_name"];
    }

    function countryHelper(addr, index) {  
        return addr["types"][0] == "country" ;
    }
    
</script>
</body>



</html>