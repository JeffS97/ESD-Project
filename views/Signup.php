<!doctype html>
<html lang="en">

<link href="https://fonts.googleapis.com/css?family=PT+Sans|Ubuntu:400,500" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/44084b3444.js" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!--Open Sans Regular-->
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

<!--Montserrat-->
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">


    


<head>
<?php session_start();
function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');</script>"; 
} 
if (isset($_SESSION['error'])) { 

   function_alert($_SESSION['error']);
   unset($_SESSION["error"]);

}

?>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .logo{
          font-family: 'Open Sans', sans-serif;
          font-weight: bolder;
        } 
        
      body{
        font-family: 'Open Sans', sans-serif;
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
            margin-top: 70px;
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
        
        .bh,
        .bp {
            margin-left: 20px;
            margin-right: 20px;
            color: #fafafa;
            letter-spacing: 1px;
            text-align: center;
        }
        
        .bh {
            font-family: 'Open Sans', sans-serif;
            font-size: 30px;
            font-weight: 500;
        }
        
        .bp {
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
            left: 150px;
        }
        
        .background .right button {
            left: 550px;
        }
        
        .form-container {
            position: absolute;
            width: 375px;
            height: 400px;
            background-color:white;
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
            height: 40px;
            font-size: 15px;
            border: 0;
            border-radius: 30px;
            background: transparent;
            border: 1px solid white;
            color: #fafafa;
            -webkit-transition: .3s all;
            transition: .3s all;
            justify-content: center;
            
        }
        
        .back-btn:hover {
            background-color: #1f3f47;
            border: 1px solid #1f3f47;
        }
        
        .form-btn {
            display: block;
            margin-top: 30px;
            width: 150px;
            height: 40px;
            font-size: 18px;
            border: 0;
            border-radius: 30px;
            background-color: #5dbcd2;
            color: #fafafa;
            -webkit-transition: .4s all;
            transition: .4s all;
            
        }

        .sign-up button:hover,
        .login button:hover {
            background-color: #1f3f47;
        }
        
        
        .form-header {
            font-size: 32px;
            color: black;
            text-align: center;
            font-family: 'Open Sans', sans-serif;
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

        body{
            background-image: url("../resources/images/hero.png"); 
            background-size: cover; 
        
        }
        
    </style>
</head>

<body>

    <div class="container" id = 'background'>

  <!-- <img src="../resources/hero.png" id = 'background' style="z-index:-1;width:100%;height:100%; 
  mix-blend-mode: soft-light;">;
            -->
         
       <!-- <div class="col-lg-8 " style="float: right;"><span class = 'logo' style="padding: 10px; font-size: 40px; padding-bottom: 5px; float: center; margin-left: 25%; margin-top:20%;" ><img src = "https://www.flaticon.com/svg/static/icons/svg/1624/1624453.svg" height = 50px width = 50px> PROJECT HERO</span>
    https://static1.squarespace.com/static/5f0384852da53a4ed0d548c9/t/5f03860d5b6cfa0aa7a5a52c/1605039836562/?format=1500w -->
        
    
    <div class="col-sm-12" style = 'float: left; margin-top: 9%'>
    <div class="wrapper" style = 'background-color: #de625b' >
    
    
        <div class="background">
        
            <div class="left" style = 'text-align: center'>
            
                <h2 class="bh" style = 'margin-top: 50px' ></b>Don't have an account?</b></h2>
                <p class="bp" style = 'text-align: center'>Sign up today to be a Hero or get a Hero to help you!</p>
                <button class="back-btn signup-but">Sign Up</button>
            </div>
            <div class="right">
                <h2 class="bh" style = 'margin-top: 50px'>Do you already have an account?</h2>
                <p class="bp">Let's get you logged in!</p>
                <button class="back-btn login-but">Log In</button>
            </div>
        </div>
        <div class="form-container">
            <div class="sign-up">
                <form method="post" action="../Main/process_register.php" >
                <h2 class="form-header">Sign Up</h2>

             
                <input type="text" name="fullname" id = 'fullnameSU' placeholder="Enter Full Name"><i class="fa fa-user"></i></input>
                <input type="text" name="username" id = 'usernameSU' placeholder="Username"><i class="far fa-address-card"></i></input>
                <input type="text" name="email" id = 'emailSU' placeholder="Email"><i class="fa fa-envelope-o"></i></input>
                <input type="password" name="password" id='passwordSU' placeholder="Password"><i class="fa fa-lock"></i></input>
                <button type="submit" class="form-btn " style="margin-left: 20%;" onclick = "signUpValidate()" >Sign Up</button>
                <div id = "errorSU"></div>
            </form>
            </div>
            <div class="my-5">
            <div class="login hide ">
                <form method="post"  action="../Main/process_login.php" >
                <h2 class="form-header">Log In</h2>  
                <input type="text" name="email" id = 'emailLI' placeholder="Email"><i class="fa fa-envelope-o"></i></input>
                
                <input type="password" name="password" id = 'passwordLI' placeholder="Password"><i class="fa fa-lock"></i></input>
              
                <div class="g-recaptcha" style="margin-top: 10px;" data-sitekey="6Lf2x-IZAAAAALMzDGQ3989jbM0-iRozvWHqGvb9"></div>
                 <br/>
                <div id = 'errorLI'></div>
                <button type = 'submit' class="form-btn text-center" style="margin-left: 20%;" onclick='logInValidate()'>Log In</button>
                </form>
              
            </div>
            </div>
           
    </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <script>

    function signUpValidate(){
        document.getElementById("errorSU").innerHTML = '';
        var fullnameSU = document.getElementById("fullnameSU").value;
        var usernameSU = document.getElementById("usernameSU").value;
        var emailSU = document.getElementById("emailSU").value;
        var passwordSU = document.getElementById("passwordSU").value;
        var errors = [];

            if (fullnameSU === "" || usernameSU === "" || emailSU === "" || passwordSU === ""){
                event.preventDefault();
                errors.push('Error: None of your fields can be empty');
            };

            if (!emailSU.includes('@') || !emailSU.includes('.com')){
                event.preventDefault();
                errors.push('Error: Please enter a valid email');
            };

            for (error of errors){
                document.getElementById("errorSU").innerHTML += `<p style = 'margin: 2px; font-size: 10px; color:red;'>${error}</p>`;
            }
        };

    function logInValidate(){
        var emailLI = document.getElementById("emailLI").value;
        var passwordLI = document.getElementByID("passwordLI").value;

        if (emailLI === "" || passwordLI === ""){
            document.getElementById("errorLI").innerHTML = `<p class = 'text-danger'>None of your fields can be empty</p>`;

        };
    };


   


(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));







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