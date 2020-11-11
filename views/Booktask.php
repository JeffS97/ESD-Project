<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <?php
    require_once "../model/protect.php";
    ;?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--Montserrat-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="../resources/templates/css template.css" />

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
          letter-spacing: 1px;
          line-height: 15px;
          border: 2px solid ;
          border-radius: 30px;
          padding: 15px;
          margin-left:85%;
          position:sticky;
          width:150px;
          
        }
        .container-fluid{
          width: 100%;
          height: 100%;
          color: #909090;
          
        }
        
        .form-valid {
            opacity: 0.5;
        }
        
        .form-control-label abbr {
            text-decoration: none;
            font-weight: normal;
        }
        
        #basic-addon1,
        #submit-btn {
            background-color: royalblue;
            color: white;
        }

        .form-group{
            text-align:left;
        }
    </style>

    <title>Project Hero</title>
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
                  <li>  <button type='button'  class='btn btn-info'  ><a href='../Main/process_logout.php' style='color: white;text-decoration: none;'>Log Out</a></button></li>
                    <?php }else{?>
                        
                   
                    <!-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="background-color: transparent;">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </form> -->
                    
                <button type="button"  class="btn btn-info" ><a href="./Signup.php" style="color: white;text-decoration: none;">Join Us</a></button>
                    <?php }?>  
                           <!-- <button type="button" class="btn btn-primary" style="margin: 10px;">Sign Up</button> -->
                    <span class = 'noti' style="padding: 10px; font-size: 25px; padding-bottom: 15px;" hidden><img src = "https://www.flaticon.com/svg/static/icons/svg/523/523152.svg" height = 35px width = 35px> </span>
                </div>
             </ul>  
            </div>
        
            </nav>
       
        </div>


    <div class="container my-5">

        <div class="modal" id="myModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Task Submitted</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                    </div>
                    <div class="modal-body">
                        <p>Your task has been submitted for our Heroes to accept!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-75 mx-auto">
            <h3>Book a Hero!</h3>
            <hr>
        </div>

        <div class="w-75 mx-auto card img-fluid">
            <!-- <img class="card-img-top" src="plumb.jpg" alt="Card image" style="height:100%;">
            <div class="card-img-overlay"> -->
            <form class="card-body" novalidate="" method="POST" action="../Main/addTask.php" id="bootstrapForm">

                <div class="form-group">
                    <label class="h4 form-control-label" for="input1">Category of Task<abbr class="text-danger" title="This is required">*</abbr></label>
                    <select class="form-control" name="i1" id="input1" required>
                        <option value="food">Shopping</option>
                        <option value="homeservice">Food</option>
                        <option value="vehiclehelp">Vehicle Help</option>
                        <option value="vehiclehelp">Home Services</option>
                        <option value="misc">Miscellaneous</option>
                            </select>
                    <!--<div class="valid-feedback">Valid</div>-->
                </div>

                <div class="form-group">
                    <label class="h4 form-control-label" for="input7">Name of Task<abbr class="text-danger" title="This is required">*</abbr></label>
                    <input type="text" class="form-control" name="i7" id="input7"  placeholder="House Cleaning" required></textarea>
                    <div class="invalid-feedback">Please enter a task title. This field is required</div>
                </div>

                <div class="form-group">
                    <label class="h4 form-control-label" for="input2">Description<abbr class="text-danger" title="This is required">*</abbr></label>
                    <textarea class="form-control" name="i2" id="input2" rows="3" placeholder="Description" required></textarea>
                    <div class="invalid-feedback">Please enter a task description. This field is required</div>
                </div>

                <div class="form-group">
                    <label class="h4 form-control-label" for="input3">Price<abbr class="text-danger" title="This is required">*</abbr></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">$</span>
                        </div>
                        <input type="text" placeholder="10.00" class="form-control" name="i3" id="input3" required>
                        <div class="invalid-feedback">Please enter a valid price like 6.50. This field is required.</div>
                    </div>

                </div>

                <div class="form-group">
                    <label class="h4 form-control-label" for="input4">Meet Me At<abbr class="text-danger" title="This is required">*</abbr></label>
                    <input type="text" class="form-control" name="i4" id="input4" placeholder="Address" required>
                    <div class="invalid-feedback">Please enter a task description. This field is required</div>
                </div>

                <!--<div class="form-group">
                    <label class="h4 form-control-label" for="input5">Time<abbr class="text-danger" title="This is required">*</abbr></label>
                    <input type="time" class="form-control time-picker" name="i5" id="input5" placeholder="" required>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
        </div>-->

                <div class="form-group">
                    <label for="input5" class="h4 form-control-label">Date and time<abbr class="text-danger" title="This is required">*</abbr></label>
                    <input class="form-control" type="datetime-local" name="i5" value="" id="input5">
                    <div class="invalid-feedback">Please enter a valid date. This field is required</div>
                </div>

                <div class="form-group">
                    <label class="h4 form-control-label" for="input6">Phone No.<abbr class="text-danger" title="This is required">*</abbr></label>
                    <input type="tel" placeholder="8008 1234" pattern="[0-9]{4} [0-9]{4}" class="form-control" name="i6" id="input6" required>
                    <div class="invalid-feedback">Please enter a phone # like 8008 1234. This field is required.</div>
                </div>
                <div>
                    <button type="submit" class="btn" id="submit-btn">Submit Request</button>
                </div>
            </form>

        </div>
        <!-- /.card -->

    </div>

    <script>
        <?php if (isset($_SESSION['task_success'])) { 
            unset($_SESSION['task_success']);?>
            
            $('#myModal').modal();
        <?php } ?>

        $("#bootstrapForm").submit(function(event) {
            var vForm = $(this);
            var dataString = $(this).serialize();
            vForm.addClass('was-validated');

            if (vForm[0].checkValidity() === false) {
                event.preventDefault()
                event.stopPropagation()
            } else {
                // $("#myModal").modal()

                // $.ajax({
                //     type: "POST",
                //     url: "process.php",
                //     data: dataString,
                //     success: function() {
                //         // Display message back to the user here
                //         $("#myModal").modal()
                //         return false;
                //     }
                // });


            }
        });
    </script>
</body>

</html>