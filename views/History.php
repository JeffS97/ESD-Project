<!DOCTYPE html>
<?php
//require_once "../model/protect.php";
//session_start();

?>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

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
        hr {
          color: #b4b3b3;
        }

        .search {
          margin: auto;
          display: flex;
          justify-content: start;
          align-items: center;
          width: 75%;
          border: 1px solid #000;
          border-radius: 20px;
          padding: 1px;
          margin-bottom: 20px;
        }

        .search__icon-background {
          display: flex;
          justify-content: center;
          border: none;
          margin: 0 5px;
        }

        .search__icon {
          color: #000;
          font-size: 25px;
        }

        .search__input-box {
          font-size: 100%;
          border: none;
          width: 90%;
        }

        input[type='search']::-webkit-search-decoration,
        input[type='search']::-webkit-search-cancel-button,
        input[type='search']::-webkit-search-results-button,
        input[type='search']::-webkit-search-results-decoration {
          -webkit-appearance: none;
        }

        .search__input-box:focus {
          outline: none;
        }

        .history {
          display: flex;
          margin-bottom: 20px;
        }

        .status_icon {
          font-size: 50px;
          margin: 10px;
        }

        .historytitle,
        .historydate {
          margin: 0;
        }

        .historydate {
          padding: 3px 0 10px 0;
          font-size: small;
          color: #808080;
        }

        .historystatus {
          align-self: center;
          margin-left: auto;
          margin-right: 10%;
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
                    <a class="nav-link" href="../../Homepage.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                  </li>
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
                  <li class="nav-item dropdown collapse">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Profile
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="../../views/History.php">History</a>
                      <a class="dropdown-item" href="../../views/Profile v2.php">Settings</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="logout.php" hidden>Log Out</a>
                    </div>
                  </li> 
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

                <button type="button"  class="btn btn-info" style="margin: 10px;"><a href="../../views/Signup.html" style="color: white;text-decoration: none;">Join Us</a></button>
              <?php }?>
                <!-- <button type="button" class="btn btn-primary" style="margin: 10px;">Sign Up</button> -->
                <span class = 'noti' style="padding: 10px; font-size: 25px; padding-bottom: 15px;" hidden><img src = "https://www.flaticon.com/svg/static/icons/svg/523/523152.svg" height = 35px width = 35px> </span>
              </div>
            </div>
          </nav>

    <div class = "container">


        <div class = "row">

            <div class = "col-lg-4 my-3">
                <div class="card card-fluid">
                    <h6 class="card-header"> Your Details </h6>
                    <nav class="nav flex-column nav-tabs">
                      <a href="Profile v2.php" class="nav-link">Profile</a>
                      <a href="Account.php" class="nav-link">Account</a>
                      <a href="History.php" class="nav-link active">History</a>
                    </nav>
                  </div>
            </div>

            <div class = "col-lg-8 my-3">
                <div class = "card card-fluid">

                    <h6 class = "card-header"> History</h6>

                    <div class="card-body">
                      
                      <div class="search">
                        <div class="search__icon-background">
                          <span
                            class="iconify search__icon"
                            data-inline="false"
                            data-icon="ant-design:search-outlined"
                          ></span>
                        </div>
                        <input class="search__input-box" type="search" />
                      </div>
                      
                      <div class="history-list"></div>
                      
                    </div>

                    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
                    <script src="../backend_services/history.js"></script>
                    </div>

                </div>
                <div class="modal fade" id="historyDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" id ="modalDetails">
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
            </div>

        </div>

    </div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>