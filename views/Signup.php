<!doctype html>
<html lang="en">

<link href="https://fonts.googleapis.com/css?family=PT+Sans|Ubuntu:400,500" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="mystyle.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<head>
<?php session_start() ?>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        
      body{
          background-color: wheat   ;
      }
        
        button:hover {
            cursor: pointer;
        }
        
        .hide {
            display: none;
        }
        
        .wrapper {
            background: rgba(0, 0, 0, 0.6);
            position: relative;
            width: 800px;
            height: 300px;
            margin: 0 auto;
            margin-top: 150px;
        }
        
        .left,
        .right {
            width: 50%;
        }
        
        .left {
            float: left;
        }
        
        .right {
            float: right;
        }
        
        .back-header,
        .back-p {
            margin: 20px;
            color: #fafafa;
            letter-spacing: 1px;
        }
        
        .back-header {
            font-family: 'Ubuntu';
            font-size: 30px;
            font-weight: 500;
        }
        
        .back-p {
            font-family: 'PT Sans';
            letter-spacing: 1px;
            font-size: 20px;
            line-height: 30px;
            margin-right: 60px;
        }
        
        .background button {
            position: absolute;
            left: 0;
            bottom: 60px;
        }
        
        .background .left button {
            left: 20px;
        }
        
        .background .right button {
            left: 420px;
        }
        
        .form-container {
            position: absolute;
            width: 375px;
            height: 400px;
            background-color: white;
            top: -25px;
            left: 10px;
            -webkit-box-shadow: 9px 13px 16px 0px rgba(0, 0, 0, 0.75);
            box-shadow: 9px 13px 16px 0px rgba(0, 0, 0, 0.75);
        }
        
        .sign-up,
        .login {
            margin: 40px;
        }
        
        .back-btn {
            width: 100px;
            height: 30px;
            font-size: 15px;
            border: 0;
            border-radius: 3px;
            background: transparent;
            border: 1px solid white;
            color: #fafafa;
            -webkit-transition: .3s all;
            transition: .3s all;
        }
        
        .back-btn:hover {
            background-color: #145977;
            border: 1px solid #145977;
        }
        
        .form-btn {
            display: block;
            margin-top: 30px;
            width: 150px;
            height: 35px;
            font-size: 18px;
            border: 0;
            border-radius: 3px;
            background-color: royalblue;
            color: #fafafa;
            -webkit-transition: .4s all;
            transition: .4s all;
        }
        
        .sign-up button:hover,
        .login button:hover {
            background-color: #C53716;
        }
        
        .form-header {
            font-size: 32px;
            color: #FC7D5F;
        }
        
        .form-container input {
            margin-top: 20px;
            width: 80%;
            height: 30px;
            border: 0;
            border-bottom: 1px solid #888;
        }
        
        input[type="text"],
        input[type="email"] {
            color: #555;
        }
        
        .form-container i {
            margin-left: 10px;
            margin-bottom: -5px;
            color: #888;
        }
        
        .login button,
        .forgot {
            display: inline-block;
        }
        
        .forgot {
            margin-left: 15px;
            text-decoration: none;
            color: black;
        }
        
        .forgot:hover {
            color: #FC7D5F;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <img src="../resources/images/helping.jpg" width="40%">
            </div>
        <div class="col-lg-8">
    <div class="wrapper" style="float:left;">
        <div class="background">
            <div class="left">
                <h2 class="back-header">Dont have an account yet?</h2>
                <p class="back-p">Well doggonit you should sign up today!</p>
                <button class="back-btn signup-but">SIGN UP</button>
            </div>
            <div class="right">
                <h2 class="back-header">Do you already have an account?</h2>
                <p class="back-p">Well doggonit let's get you logged in!</p>
                <button class="back-btn login-but">LOGIN</button>
            </div>
        </div>
        <div class="form-container">
            <div class="sign-up">
                <form method="post" action="../Main/process_register.php" >
                <h2 class="form-header">SIGN UP</h2>

             
                <input type="text" name="fullname" placeholder="Enter Full Name"><i class="fa fa-user"></i></input>
                <input type="text" name="username" placeholder="Username"><i class="fa fa-envelope-o"></i></input>
                <input type="text" name="email" placeholder="Email"><i class="fa fa-envelope-o"></i></input>
                <input type="password" name="password" placeholder="Password"><i class="fa fa-lock"></i></input>
                <button type="submit" class="form-btn " style="margin-left: 20%;"  >SIGN UP</button>
            </form>
            </div>
            <div class="my-5">
            <div class="login hide ">
                <form method="post"   action="../Main/process_login.php" >
                <h2 class="form-header">LOGIN</h2>  
                <input type="text" name="email" placeholder="Email"><i class="fa fa-envelope-o"></i></input>
                
                <input type="password" name="password" placeholder="Password"><i class="fa fa-lock"></i></input>
              
                <div class="g-recaptcha" style="margin-top: 10px;" data-sitekey="6LcvOtsZAAAAAPiHd4MP6LealQ4myJuvWzb_4GpM"></div>
                 <br/>
              
                <button class="form-btn" style="margin-left: 20%;">LOGIN</button>
                </form>
              
            </div>
            </div>
           
            <div id="status"></div>	
<!-- Facebook login or logout button -->
<a href="javascript:void(0);" onclick="fbLogin();" id="fbLink"><img style="width:200px" src="facebook.png 
"/></a>

<!-- Display user's profile info -->
<div class="ac-data" id="userData"></div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <script>
        window.fbAsyncInit = function() {
    // FB JavaScript SDK configuration and setup
    FB.init({
      appId      : '2758183634395949', // FB App ID
      cookie     : true,  // enable cookies to allow the server to access the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8' // use graph api version 2.8
    });
    
    // Check whether the user already logged in
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            //display user data
            getFbUserData();
        }
    });
};

// Load the JavaScript SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Facebook login with JavaScript SDK
function fbLogin() {
    FB.login(function (response) {
        if (response.authResponse) {
            // Get and display the user profile data
            
            getFbUserData();
           
        } else {
            document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
        }
    }, {scope: 'email'});
}

// Fetch the user profile data from facebook
function getFbUserData(){
    
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
    function (response) {
       
        document.getElementById('fbLink').setAttribute("onclick","fbLogout()");
        document.getElementById('fbLink').innerHTML = 'Logout from Facebook';
        document.getElementById('status').innerHTML = '<p>Thanks for logging in, ' + response.first_name + '!</p>';
        document.getElementById('userData').innerHTML = '<h2>Facebook Profile Details</h2><p><img src="'+response.picture.data.url+'"/></p><p><b>FB ID:</b> '+response.id+'</p><p><b>Name:</b> '+response.first_name+' '+response.last_name+'</p><p><b>Email:</b> '+response.email+'</p>';
    });
}

// Logout from facebook
function fbLogout() {
    FB.logout(function() {
        document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
        document.getElementById('fbLink').innerHTML = '<img src="images/fb-login-btn.png"/>';
        document.getElementById('userData').innerHTML = '';
        document.getElementById('status').innerHTML = '<p>You have successfully logout from Facebook.</p>';
    });
}
        $(document).ready(function() {
            var signUp = $('.signup-but');
            var logIn = $('.login-but');


            signUp.on('click', function() {
                $('.login').fadeOut('slow').css('display', 'none');
                $('.sign-up').fadeIn('slow');

                $('.form-container').animate({
                    left: '10px'
                }, 'slow');
            });

            logIn.on('click', function() {
                $('.login').fadeIn('slow');
                $('.sign-up').fadeOut('slow').css('display', 'none');

                $('.form-container').animate({
                    left: '400px'
                }, 'slow');
            });
        });
    </script>
</body>

</html>