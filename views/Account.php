<?php 

$passwordEntered = false;

require_once '../model/common.php';

$email = "admin@gmail.com"; # to change to session email later

$dao = new UserDAO();
$user = $dao->retrieve($email);
$hashedPass = $user->getPassword();

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

    <div class = "container" id="app">

        <div class = "row">

            <div class = "col-lg-4 my-3">
                <div class="card card-fluid">
                    <h6 class="card-header"> Your Details </h6>
                    <nav class="nav flex-column nav-tabs">
                      <a href="Profile.php" class="nav-link">Profile</a>
                      <a href="Account.php" class="nav-link active">Change Password</a>
                      <a href="History.php" class="nav-link">History</a>
                    </nav>
                  </div>
            </div>

            <div class = "col-lg-8 my-3">
                <div class = "card card-fluid">

                    <h6 class = "card-header"> Change Password</h6>

                    <div>{{currentPass}}</div>

                    <div class="card-body">
                        <form method="post" @submit="validateForm" action = "Account.php" enctype="multipart/form-data" >
                          <div class="form-group">
                            <label for="newPass">New Password</label>
                            <input type="password" class="form-control" id="newPass" value="" v-model="newPass"></div>
                            <p class = "text-danger" v-if="submitAttempt">{{passError}}</p>
                          <div class="form-group">
                            <label for="newPassConfirm">Confirm New Password</label>
                            <input type="password" class="form-control" id="newPassConfirm" value="" v-model="newPassConfirm"></div>
                            <p class = "text-danger" v-if="submitAttempt">{{passConfirmError}}</p>
                          <hr>
                          <div class="form-actions">
                            <div class = "btn-toolbar justify-content-between"><input type="password" class="form-control col-md-9" name="currentPassEntered"  v-model = "currentPassEntered" placeholder="Enter Current Password">
                              <button type="submit" class="btn btn-primary">Update Account</button></div>
                          </div>
                          <p></p>
                          <p class = "text-danger" v-if="submitAttempt">{{currentPassError}}</p>
                          <?php
                          if (isset($_POST["currentPassEntered"])){
                            $_SESSION["currentPassEntered"] = $_POST["currentPassEntered"];
                            if (!password_verify($_SESSION["currentPassEntered"], $hashedPass)){
                                echo "<p class = 'text-danger'>Does not match!</p>";
                            }
                            };
                          ?>
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
            submitAttempt: false,
            currentPass: "",
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

        },
        methods: {
            validateForm: function(){
                if(this.passError || this.passConfirmError || this.currentPassError){
                    event.preventDefault();
                    this.submitAttempt = true;
                }
            },
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