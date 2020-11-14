<!DOCTYPE html>
<?php
    spl_autoload_register(function($class){
        require_once "../model/$class.php";
    });
    session_start();

    $id=$_GET["id"];
    $num=false;
    if(isset($_GET["check"])){
        $num=true;
    }
    $dao = new gigDetailsDAO();

    $gigArray = $dao->viewBooking($id);

    $accepter = $gigArray[0]->getGigAccepter();

    if($accepter!=null){
        $userdao = new userDAO();

        $accepterProfile = $userdao->retrieve($accepter);


        $accepterName = $accepterProfile->getFullName();
        $accepterUserName = $accepterProfile->getUsername();
        $imagePath = "../resources/profileImages/$accepter.jpg";
        $noImagePath = "../resources/profileImages/default.jpg";
    }

?>

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1iSJyi8nOzkGwMWsmrEDQstq6b22-XoI&callback=initMap&libraries=&v=weekly" defer></script>
    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 650px;  /* The height is 400 pixels */
            width: 100%;  /* The width is the width of the web page */
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
    width:75%;
    margin-left:10%;
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
     width:100%;
    
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
 .loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 60px;
  margin-left:50%;
  height: 60px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

 .track .text {
     display: block;
     margin-top: 7px;
     font-size:16px;
 }

 #duration{
     width:270px;
     margin-left:100px;
 }

 .card-img-top{
     height:200px;
 }

 #chatButton{
     margin:20px;
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
                    <div class="dropdown-divider"></div>
                    
                    </div>
                </li> 
              <li>  <button type='button'  class='btn btn-info'  ><a href='./process_logout.php' style='color: white;text-decoration: none;'>Log Out</a></button></li>
                <?php }else{?>
                    
                
         <li> <button type="button"  class="btn btn-info" ><a href="../views/Signup.php" style="color: white;text-decoration: none;">Join Us</a></button></li>  
                <?php }?>  
                <span class = 'noti' style="padding: 10px; font-size: 25px; padding-bottom: 15px;" hidden><img src = "https://www.flaticon.com/svg/static/icons/svg/523/523152.svg" height = 35px width = 35px> </span>
            </div>
         </ul>  
        </div>
        </nav>
        <?php
            if($accepter==null){
         echo   "<i><h1 style='position:relative;margin-left:40%;' >Searching a Hero for you</h1></i> <div class='loader '></div>";
            }

            ?>
        <div class="track" >
                <div class="step active"> <span class="icon"> <i class="fa fa-eye"></i> </span> <span class="text">Post Request</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-address-card"></i> </span> <span class="text"> Wait for it to be accepted</span> </div>
               <?php
             
               if($accepter==null){
                  
            echo  ' <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Hero accepted and coming to Help! </span> </div>';

               }
               else{
              echo  '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Hero accepted and coming to Help! </span> </div>';
               }
?>
            </div>
           
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <div id="floating-panel">
                <b>Your Address: </b>
                <span id="start"><?php echo  $gigArray[0]->getBookeraddress()?>
                </span>
                <b>Hero's Location: </b>
                <span id="end"><?php echo  $gigArray[0]->getAccepteraddress()?>
                </span>
                </div>
                <div id="map"></div>
                </div>

                <div class="col-lg-4 mt-5">
                    <div id="duration">
                    <?php if($accepter!=null){
                    if($gigArray[0]->getAccepteraddress()===null){
                        echo "<h1> No Hero has come to your rescue yet! Please be patient </h1>";}
                        else{
                            echo '<div class="card text-center" style="width: 18rem;">
                            <img class="card-img-top" src="'.$imagePath.'">
                            <div class="card-body">
                            <h5 class="card-title">This is your hero!</h5>
                            <p class="card-text"><b>'.ucwords($accepterName).'</b></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0" id="durationData"></li>
                            </ul>
                            ';
                            if($num){
                               echo ' <a href="../views/Chat.php?id='.$id.'" id="chatButton" class="btn btn-warning mx-auto">Chat with Customer</a> </div>;';
                            
                                }   
                                else{
                                    echo ' <a href="../views/Chat.php?id='.$id.'" id="chatButton" class="btn btn-warning mx-auto">Chat with Hero </a> </div>;';
                                }
                            //echo "Unable to compute travel time and route due to incorrect address format. <br> Rest assured! your hero is still on his way";
                            }
                        }?>
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  

        <script>
            function initMap() {
            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer();
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: { lat: 1.43, lng: 103.83 },
            });
            directionsRenderer.setMap(map);

            calculateAndDisplayRoute(directionsService, directionsRenderer);
            }

            function calculateAndDisplayRoute(directionsService, directionsRenderer) {
                geocoder = new google.maps.Geocoder();
                var startadd = document.getElementById("start").innerText;
                var endadd = document.getElementById("end").innerText;

                geocoder.geocode( { 'address': startadd}, function(results, status) {
                    if (status == 'OK') {
                        startadd = results[0].geometry.location
                    }
                    else {
                    //alert('Geocode was not successful for the following reason: ' + status);
                }
                });

                geocoder.geocode( { 'address': endadd}, function(results, status) {
                    if (status == 'OK') {
                        endadd = results[0].geometry.location
                    }
                    else {
                    //alert('Geocode was not successful for the following reason: ' + status);
                }
                });
                directionsService.route(
                    {
                    origin: {
                        query: startadd,
                    },
                    destination: {
                        query: endadd,
                    },
                    travelMode: google.maps.TravelMode.DRIVING,
                    },
                    (response, status) => {
                    if (status === "OK") {
                        var directionsData = response.routes[0].legs[0];
                        console.log(directionsData.duration.text);
                        document.getElementById("durationData").innerHTML = 'Your Hero will take:</br> <h1>' + directionsData.duration.text + "</h1></br> to come to your aid!";
                        directionsRenderer.setDirections(response);
                    } else {
                        document.getElementById("durationData").innerHTML = "<h1> Unable to compute travel time and route due to incorrect address format. <br> Rest assured! your hero is still on his way. </h1>";
                        //window.alert("Directions request failed due to " + status);
                    }
                    }
                );
            }
        </script>



        



