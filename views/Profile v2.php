<!DOCTYPE html>
<?php
require_once "../model/protect.php";
$email = $_SESSION["email"];

?>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .checked {
            color: orange;
            }
            .graph{
              width: 50%;
              margin-left: 40%;
              margin-top: 5%;


            }
            .logo{
          font-family: 'Open Sans', sans-serif;
          font-weight: bolder;
        } 
      body{
        font-family:'Montserrat', sans-serif;
        
      }
     
        .nav-item{
            padding-left: 20px;
            padding-right: 20px;
            font-family:'Montserrat', sans-serif;
            font-size: 23px;
        }
        .up {
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
    </style>
    
    <!-- Vue JS -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <!--Axios-->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!--Bootstrap JQUERY and Popper-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    <!--Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!--Bootstrap-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>

<body>

    
    
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
                        <a class="dropdown-item" href="./book2.php">Browse</a>
                        <a class="dropdown-item" href="./Booktask.php">Post</a>
                        </div>
                    </li>
                    <?php
            
              
              if(isset($_SESSION["email"])){
             ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Listings
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="userRequest.php">My Requests</a>
                        <a class="dropdown-item" href="userTasks.php">My Tasks</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profile
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="./History.php">History</a>
                        <a class="dropdown-item" href="./Profile v2.php">Settings</a>
                        <div class="dropdown-divider"></div>
                        
                        </div>
                    </li> 
                  <li>  <button type='button'  class='btn btn-info up'  ><a href='../Main/process_logout.php' style='color: white;text-decoration: none;'>Log Out</a></button></li>
                    <?php }else{?>
                        
                   
                    <!-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="background-color: transparent;">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </form> -->
                    
                <button type="button"  class="btn btn-info up" ><a href="./views/Signup.php" style="color: white;text-decoration: none;">Join Us</a></button>
                    <?php }?>  
                           <!-- <button type="button" class="btn btn-primary" style="margin: 10px;">Sign Up</button> -->
                    <span class = 'noti' style="padding: 10px; font-size: 25px; padding-bottom: 15px;" hidden><img src = "https://www.flaticon.com/svg/static/icons/svg/523/523152.svg" height = 35px width = 35px> </span>
                </div>
             </ul>  
            </div>
        
            </nav>

    <div class = "container" id = "app">


        <div class = "row">

            <div class = "col-lg-4 my-3">
                <div class="card card-fluid animate__animated animate__fadeIn">
                    <h6 class="card-header"> Your Details </h6>
                    <nav class="nav flex-column nav-tabs">
                      <a href="./Profile v2.php" class="nav-link active"> Display Profile</a>
                      <a href="./Account.php" class="nav-link"> Edit Account</a>
                      <a href="./History.php" class="nav-link">History</a>
                      
                    </nav>
                  </div>
            </div>

            <div class="col-lg-8 my-3">
                <div class="card card-fluid animate__animated animate__fadeIn">
                  <h6 class="card-header"> Public Profile </h6>
                    <div class="card-body">

                        <div class = "row">
                        <div class = "col-lg-2 d-flex align-items-center">
                          <?php echo "<img src='../resources/profileImages/$email' width='100px' height='100px'>" ?>
                        </div>
                          <div class = "col-lg-8">
                          <div>
                            <h3>Personal Details</h3>

                            <h4>Your username is: {{username}}</h4>

                            <h4>Your fullname is: {{fullname}}</h4>

                            <h4>Your email is: {{email}}</h4>
                        </div>
                          </div>
                        </div>
                    </div>
                   
                    <a href="#chart" style="margin-bottom: 20px;" class="btn btn-info" data-toggle="collapse">View Personal Earnings</a>
                <div class="bg-light collapse " style="width: 70%;margin-left:30px;"  id="chart">
    <span style="font-size: 30px;color: black;
    font-weight: 700;" id="total"></span>
    <canvas id="myChart" ></canvas></div>
                </div>
            </div>
            
            

        </div>
    </div>
    
<script>

const vm = new Vue({
    el: '#app',
    data: {
        test: "hello",
        username: "",
        fullname: "",
        email: "",

    },
    methods: {
        getUserDetails: function() {
                axios.get('../Main/getUserDetails.php')
                .then(response => {
                    this.username = response.data.username;
                    this.fullname = response.data.fullname;
                    this.email = response.data.email;
                })
                .catch(error => console.log('Could not retrieve user details...'));
        }
    },
    mounted: function(){
        this.getUserDetails();
    }
});

</script>


<!--Chart-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.js" ></script>
<script src="profile.js"></script>


</body>
</html>