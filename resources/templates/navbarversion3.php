<!doctype html>
<?php  

session_start();?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--Montserrat-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="css template.css" />

    <!--Open Sans Regular-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!--Inter-->
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Open+Sans&display=swap" rel="stylesheet">

    <style>
        .logo{
          font-family: 'Open Sans', sans-serif;
          font-weight: bolder;
        } 
        .nav{
            position: fixed; /* Stay in place */
            z-index: 1; /* Stay on top */
            top: 0; /* Stay at the top */
        }
        body{
            font-family:'Montserrat', sans-serif;
            font-size: 23px;
        }
        .nav-item{
            padding-left: 20px;
            padding-right: 20px;
        }

        @media screen and (max-width: 575px) {
            .carousel{
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }
        .btn-info {
          font-size: 20px;
          color: white;
          margin-left:85%;
          letter-spacing: 1px;
          line-height: 15px;
          border: 2px solid ;
          border-radius: 30px;
          padding: 15px;
          position: sticky;
         
       

        }
        .container-fluid{
          width: 100%;
          height: 100%;
          color: #909090;
          
        }

    </style>

    <title>Project Hero</title>
  </head>
  <body>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:white; padding: 12px;">
        <div class = 'container' style="padding: 0;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <span class = 'logo' style="padding: 10px; font-size: 25px; padding-bottom: 5px;" ><img src = "https://www.flaticon.com/svg/static/icons/svg/1624/1624453.svg" height = 40px width = 40px> PROJECT HERO</span>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav" style="margin: auto;">
                  <li class="nav-item active">
                    <a class="nav-link" href="../../Homepage.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                  </li> -->
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Task
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="../../views/book2.php">Browse</a>
                      <a class="dropdown-item" href="../../views/Booktask.php">Post</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Listings
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="userRequest.php">My Requests</a>
                      <a class="dropdown-item" href="userTasks.php">My Tasks</a>
                    </div>
                  </li>     
                  
                <?php
            
              
              if(isset($_SESSION["email"])){
             ?>
            <li class="nav-item dropdown ">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Profile
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../../views/History.php">History</a>
                <a class="dropdown-item" href="../../views/Profile v2.php">Settings</a>
              </div>
            </li> 
            <li>
            <button type='button'  class='btn btn-info' ><a href='../../views/Signup.php' style='color: white;text-decoration: none;'>Log Out</a></button>
</li>
<?php }else{?>
<li>
  <button type="button"  class="btn btn-info" ><a href="../../views/Signup.php" style="color: white;text-decoration: none;">Join Us</a></button> </li>
<?php }?>
  <!-- <button type="button" class="btn btn-primary" style="margin: 10px;">Sign Up</button> -->
  <li><span class = 'noti' style="padding: 10px; font-size: 25px; padding-bottom: 15px;" hidden><img src = "https://www.flaticon.com/svg/static/icons/svg/523/523152.svg" height = 35px width = 35px> </span>
  </li>  </ul>
         
              </div>
          </div>
      </nav>
        


    <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" style="height: 600px; overflow:auto;">
          <div class="carousel-item active">
            <img class="d-block w-100" src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1051&q=80" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="https://media2.s-nbcnews.com/j/newscms/2017_41/2187641/171012-better-stock-house-cleaner-ew-531p_524663bd13e994184485cf04bf4a26e0.fit-2000w.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="https://zone-thebestsingapore-bhxtb9xxzrrdpzhqr.netdna-ssl.com/wp-content/uploads/2019/01/top-recommended-handyman-service-singapore.jpg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div> -->
      

        
      </div>
<div>
  
</div>
  </body>
</html>

