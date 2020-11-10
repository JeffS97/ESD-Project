<?php
    # Autoload and start session
    spl_autoload_register(
        function($class){
            require_once "../model/$class.php";
        }
    );
    session_start();

    # Get parameters passed from login.php
    $email = $_POST["email"];
    $password = $_POST["password"];

    # Get user information
    $dao = new UserDAO();
    $user = $dao->retrieve($email);

    # Check if user exists 
    $success = false;
    if($user != null){
        # Get stored hashed password
        $hashed = $user->getPassword();
       
        # Check if entered password matches stored hashed password
        $success = password_verify($password,$hashed); 
        var_dump(password_hash($password,PASSWORD_DEFAULT));
        var_dump($hashed);
        if($success){
            # Create a session entry for successful login
            $_SESSION["email"] = $email;
            # Redirect to welcome.php
            header("Location: ../Homepages.php");
            exit;
        }
    }

    # Failed login
    if (!$success){
        # Add "error" => "Failed Login" key-value pair to the session
        $_SESSION["error"] = "Failed Login";
        # Redirect to login.php, while passing username information 
        # at the back of the URL, e.g., header("Location: login.php?...");
       header("Location: ../views/Signup.html");
        exit; 
    }
?>
