<?php
    # Autoload
    spl_autoload_register(
        function($class){
            require_once "../model/$class.php";
        }
    );
    
    # Start session
    session_start();

   
    # Get parameters passed from register.php
    $email = $_POST["email"];
    $password = $_POST["password"];
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];

   

    # Hash entered password
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    # Add new user
    $dao = new UserDAO();
    $status = $dao->add($email,$hashed,$fullname,$username);
    if($status){
        # Send success message in the session
        $_SESSION["success"] = "Registration Successful";

        # Redirect to login.php
        # Provide information of the newly registered user 
        # at the back of the URL
        header("location: ../Homepage.php");
        exit;
    }
    else{
        echo "Failed to register";
    
} 
?>