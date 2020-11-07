<!DOCTYPE html>

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
        .btn-primary {
          font-size: 20px;
          color: white;
          letter-spacing: 1px;
          line-height: 15px;
          border: 2px solid #34558b;
          border-radius: 30px;
          padding: 15px;
          margin-top: 20px;
          background-color:#34558b;
        }
    </style>
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
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Task
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="../views/book2.php">Browse</a>
                  <a class="dropdown-item" href="./Booktask.php">Post</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Listings
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">My Requests</a>
                  <a class="dropdown-item" href="#">My Tasks</a>
                </div>
              </li>
              <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">History</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" hidden>Log Out</a>
                </div>
              </li> -->
            </ul>
            <!-- <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="background-color: transparent;">
              <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form> -->
            <?php
        
          
          if(isset($_SESSION["email"])){
         ?>
       <button type='button'  class='btn btn-primary' style='margin:10px;'><a href='../../views/Signup.html' style='color: white;text-decoration: none;'>Log Out</a></button>
          <?php }else{?>

  
        
            <button type="button"  class="btn btn-primary" style="margin: 10px;"><a href="../../views/Signup.html" style="color: white;text-decoration: none;">Join Us</a></button>
          <?php }?>
            <!-- <button type="button" class="btn btn-primary" style="margin: 10px;">Sign Up</button> -->
            <span class = 'noti' style="padding: 10px; font-size: 25px; padding-bottom: 15px;" hidden><img src = "https://www.flaticon.com/svg/static/icons/svg/523/523152.svg" height = 35px width = 35px> </span>
          </div>
      </nav>
    </div>

    <div class = "container">


        <div class = "row">

            <div class = "col-lg-4 my-3">
                <div class="card card-fluid">
                    <h6 class="card-header"> Your Details </h6>
                    <nav class="nav flex-column nav-tabs">
                      <a href="Profile.php" class="nav-link active">Profile</a>
                      <a href="Account.php" class="nav-link">Account</a>
                      <a href="History.php" class="nav-link">History</a>
                      
                    </nav>
                  </div>
            </div>

            <div class="col-lg-8 my-3">
              
                <div class="card card-fluid">
                  <h6 class="card-header"> Public Profile </h6>
                  <div class="card-body">

                    <div class="media mb-3">
                      <div class="user-avatar user-avatar-xl fileinput-button">
                        <div class="fileinput-button-label"> Change photo </div>
                        <img src="assets/images/avatars/profile.jpg" alt="User Avatar">
                        <input id="fileupload-avatar" type="file" name="avatar"> </div>

                      <div class="media-body pl-3">
                        <h3 class="card-title"> Public avatar </h3>
                        <h6 class="card-subtitle text-muted"> Click the current avatar to change your photo. </h6>
                        <p class="card-text">
                          <small>JPG, GIF or PNG 400x400, &lt; 2 MB.</small>
                        </p>

                        <div id="progress-avatar" class="progress progress-xs fade">
                          <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        
                      </div>
                      
                    </div>
                    <a href="#chart" style="margin-bottom: 20px;" class="btn btn-danger" data-toggle="collapse">View Personal Earnings</a>
  
  <div class="bg-light collapse " style="width: 70%;margin-left:30px;"  id="chart">
    <span style="font-size: 30px;color: black;
    font-weight: 700;" id="total"></span>
    <canvas id="myChart" ></canvas></div>
  </div>
                    <div class = "row">

                        <div class = "col-md-3 mb-3">
                          
                            Rating as a Hero
                        </div>

                        <div class = "col-md-9 mb-3">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>

                    </div>

                    <div class = "row">

                        <div class = "col-md-3 mb-3">
                            Rating as a Client
                        </div>

                        <div class = "col-md-9 mb-3">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>

                    </div>

                    
                    
                    <form method="post">
                      
                      <div class="form-row">
                      
                        <label for="input01" class="col-md-3">Profile Heading</label>
                        
                        
                        <div class="col-md-9 mb-3">
                          <textarea type="text" class="form-control" id="input01"></textarea>
                          <small class="text-muted">Appears on your profile page, 300 chars max.</small>
                        </div>
                    
                      </div>
                
                      
                      <div class="form-row">
                    
                        <label for="input02" class="col-md-3">Available for hire?</label>
                    
                        <div class="col-md-9 mb-3">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="input02" checked>
                            <label class="custom-control-label" for="input02">Yes, hire me</label>
                          </div>
                          <small class="text-muted">You will receive notifications for jobs.</small>
                        </div>
                      
                      </div>
                      
                      <hr>
                      
                      <div class="form-actions">
                        <button type="submit" class="btn btn-primary ml-auto">Update Profile</button>
                      </div>
                      
                    </form>
                    
                  </div>
                </div>


        </div>
        
 
  </div>
    


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.js" ></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
<script src="profile.js"></script>
</html>