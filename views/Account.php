<?php 

$passwordEntered = false;

require_once '../model/common.php';
require_once '../model/protect.php';

$email = $_SESSION["email"]; 

$dao = new UserDAO();
$user = $dao->retrieve($email);
$hashedPass = $user->getPassword();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

?>


<!DOCTYPE html>

<head>
    
<!-- Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- Vue JS -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<!--Axios-->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!--Awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <!--Animate CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


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
    </style>

</head>

<body>

    </div>
    
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
                        <a class="dropdown-item" href="./History.php">History</a>
                        <a class="dropdown-item" href="./Profile v2.php">Settings</a>
                        <div class="dropdown-divider"></div>
                        
                        </div>
                    </li> 
                  <li>  <button type='button'  class='btn btn-info'  ><a href='../views/Signup.php' style='color: white;text-decoration: none;'>Log Out</a></button></li>
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
    <div class = "container" id="app">

        <div class = "row">

            <div class = "col-lg-4 my-3">
                <div class="card card-fluid animate__animated animate__fadeIn">
                    <h6 class="card-header"> Your Details </h6>
                    <nav class="nav flex-column nav-tabs">
                      <a href="./Profile v2.php" class="nav-link">Display Profile</a>
                      <a href="./Account.php" class="nav-link active">Edit Account Details</a>
                      <a href="./History.php" class="nav-link">History</a>
                    </nav>
                  </div>
            </div>

            <div class = "col-lg-8 my-3">
                <div class = "card card-fluid animate__animated animate__fadeIn">

                    <h6 class = "card-header"> Change Password</h6>

                    <div class="card-body">
                        <form method="post" @submit="validateFormPass" action = "Account.php" enctype="multipart/form-data" >
                          <div class="form-group">
                            <label for="newPass">New Password</label>
                            <input type="password" class="form-control" id="newPass" value="" v-model="newPass"></div>
                            <p class = "text-danger" v-if="submitAttemptPass">{{passError}}</p>
                          <div class="form-group">
                            <label for="newPassConfirm">Confirm New Password</label>
                            <input type="password" class="form-control" id="newPassConfirm" value="" name="newPassConfirm" v-model="newPassConfirm"></div>
                            <p class = "text-danger" v-if="submitAttemptPass">{{passConfirmError}}</p>
                          <hr>
                          <div class="form-actions">
                            <div class = "btn-toolbar justify-content-around"><input type="password" class="form-control col-md-8" name="currentPassEntered"  v-model = "currentPassEntered" placeholder="Enter Current Password">
                              <button type="submit" class="btn btn-warning col-md-3" style = "padding:10px; margin-top: 0px; font-size: 15px;">Update Password</button></div>
                          </div>
                          <p></p>
                          <p class = "text-danger" v-if="submitAttemptPass">{{currentPassError}}</p>
                          <?php
                          if (isset($_POST["currentPassEntered"])){
                            $_SESSION["currentPassEntered"] = $_POST["currentPassEntered"];
                            $_SESSION["newPassConfirm"] = $_POST["newPassConfirm"];
                            if (!password_verify($_SESSION["currentPassEntered"], $hashedPass)){
                                echo "<p class = 'text-danger'>Your entered password does not match your current password!</p>";
                            }
                            else{
                              $newPassHashed = password_hash($_SESSION["newPassConfirm"], PASSWORD_DEFAULT);
                              $dao->updatePassword($email, $newPassHashed);
                              echo "<p class = 'text-success'>Your password has been changed!</p>";
                            }
                            };
                          ?>
                        </form>
                      </div>

                </div>
            </div>


            <div class = "offset-lg-4 col-lg-8 my-3">
                <div class = "card card-fluid animate__animated animate__fadeIn">

                    <h6 class = "card-header"> Change Profile Picture</h6>

                    <div class="card-body">
                        <form method="post" @submit="validateFormProfile" action = "../Main/profileImageUpload.php" enctype="multipart/form-data" >
                          <div class="form-group">
                          <label for="file">Upload/Change Profile Picture</label>
                            <input type="file" class="form-control" id="file" value="" v-model="file" name="file"></div>
                            <p class = "text-danger" v-if="submitAttemptProfile">{{profileError}}</p>
                            <?php if(isset($_SESSION["successUpdate"])){
                              if(!$_SESSION["successUpdate"]){
                                echo "<p class = 'text-danger'>Error uploading your image, only JPG accepted or file may be too large</p>";
                              }else{
                                echo "<p class = 'text-success'>Your image was uploaded successfully, check your profile!</p>";
                                unset($_SESSION["successUpdate"]);
                              }
                            }; ?>
                            <div class="form-actions col-md">
                              <button type="submit" class="btn btn-warning offset-lg-9 col-md-3" style = "padding:10px; margin-top: 0px; font-size: 12px;">Update Profile Picture</button></div>
                          </div>
                        </form>
                      </div>

                </div>
            </div>

        </div>

        

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script>

    const vm = new Vue({
        el: '#app',
        data: {
            newPass: "",
            newPassConfirm: "",
            currentPassEntered: "",
            submitAttemptPass: false,
            submitAttemptProfile: false,
            currentPass: "",
            file: ""
        },
        computed: {
            passError: function(){
                if(this.newPass.length === 0){
                    return "You need to enter in a new password!";
                }
                else{
                    return '';
                }
            },
            passConfirmError: function(){
                if(this.newPassConfirm.length === 0){
                    return "You need to enter in the new password again!";
                }
                else if(this.newPass != this.newPassConfirm){
                    return "Your passwords do not match!";
                }
                else{
                    return '';
                }
            },
            currentPassError: function(){
                if(this.currentPassEntered.length === 0){
                    return "You need to enter your current password!";
                }
                else{
                    return '';
                }
            },
            profileError: function(){
              if(this.file.length === 0){
                return "You need to select a file!";
              }
              else{
                return '';
              }
            },
            imageError: function(){
              if (filesize(this.file) >  134217728 ){
                return "This file is too big";
              }
            }
            
        },
        methods: {
            validateFormPass: function(){
                if(this.passError || this.passConfirmError || this.currentPassError){
                    event.preventDefault();
                    this.submitAttemptPass = true;
                }
            },
            validateFormProfile: function(){
                if(this.profileError){
                    event.preventDefault();
                    this.submitAttemptProfile = true;
                }
            }
            // getPassword: function() {
            //         axios.get('../Main/getUserDetails.php')
            //         .then(response => {
            //             this.currentPass = response.data.password;
            //         })
            //         .catch(error => console.log('Could not retrieve password...'));
            // }
        },
        // mounted: function(){
        //     this.getPassword();
        // }
    });

    </script>

</body>

</html>