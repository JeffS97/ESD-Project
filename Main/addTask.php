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
   /* $email = $_SESSION["email"];
    $fullname = $_SESSION["fullname"];
    $username = $_SESSION["username"];*/
    $email = 'rohan';
    $fullname = 'rohan';
    $username = 'rohan';

    $category = $_POST["i1"];
    $description = $_POST["i2"];
    $gigName = $_POST["i7"];
    $price = (int)$_POST["i3"];
    $start = urldecode($_POST["i5"]);
    $start = str_replace('T'," ", $start);
    $status = "Active";
    $bookeradd = $_POST["i4"];

    var_dump($email,$category,$gigName,$price,$start,$status,$bookeradd);

    # Add new user
    $dao = new gigDetailsDAO();
    $status = $dao->createBooking($email,$category,$gigName,$price,$start,$status,$bookeradd);
    if($status){
        # Send success message in the session
        $_SESSION["task_success"] = "Success";

        # Redirect to login.php
        # Provide information of the newly registered user 
        # at the back of the URL
        header("location: ../views/Book task.php");
        exit;
    }
    else{
        echo "Failed to register";
    
} 
?>