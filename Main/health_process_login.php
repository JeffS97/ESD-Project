<?php
    # Autoload and start session
    spl_autoload_register(
        function($class){
            require_once "../model/$class.php";
        }
    );
    session_start();
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    if(empty($email) || empty($password)){
        header("Location: ../views/Signup.php");
        $_SESSION["error"] = "Credentials cannot be empty";
        exit();
    };

    # Get user information
    $dao = new UserDAO();
    $healthworker = $dao->retrieveHealth($email);

    # Check if user exists 
    $success = false;
    // if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
    // {
    //       $secret = '6Lf2x-IZAAAAAKgiSKXLf0p4aHiSTjdxEQGJAQM8';
    //       $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    //       $responseData = json_decode($verifyResponse);

        //   if($responseData->success)
        //   {
            if($healthworker != null){
                # Get stored hashed password
                $hashed = $healthworker->getPassword();
                $Name = $healthworker->getName();
                $email = $healthworker->getEmail();
                $role = $healthworker->getRole();
                $gid = $healthworker->getGid();
               
                # Check if entered password matches stored hashed password
                $success = password_verify($password,$hashed); 
                var_dump(password_hash($password,PASSWORD_DEFAULT));
                var_dump($hashed);
                if($success){
                    # Create a session entry for successful login
                    $_SESSION["email"] = $email;
                    $_SESSION["fullname"] = $Name;
                    $_SESSION["role"] = $role;
                    $_SESSION["gid"] = $gid;
                    # Redirect to welcome.php
                    header("Location: ../Homepage.php");
                    exit;
                }
            };

        
            # Failed login
            if (!$success){
                # Add "error" => "Failed Login" key-value pair to the session
                $_SESSION["error"] += "Failed Login";
                # Redirect to login.php, while passing username information 
                # at the back of the URL, e.g., header("Location: login.php?...");
               header("Location: ../views/Signup.php");
               $_SESSION["error"]="Wrong Credentials Entered";
                exit; 
            }
        //   }
        //   else
        //   {
        //     header("Location: ../views/Signup.php");
        //     exit; 
        //   }
    //  }
    //  else{
    //     header("Location: ../views/Signup.php");
    //     $_SESSION["error"]="Must verify the reCaptcha";
    //     exit; 
    //  }
    # Get parameters passed from login.php
   
   
?>
