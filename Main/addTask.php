<?php
    # Autoload
    spl_autoload_register(
        function($class){
            require_once "../model/$class.php";
        }
    );
    
    # Start session
    session_start();

    # Get parameters passed from register/login.php
    $email = $_SESSION["email"];
    $fullname = $_SESSION["fullname"];
    $username = $_SESSION["username"];

    $category = $_POST["i1"];
    $description = $_POST["i2"];
    $gigName = $_POST["i7"];
    $price = (int)$_POST["i3"];
    $start = urldecode($_POST["i5"]);
    $start = str_replace('T'," ", $start);
    $status = "Active";
    $bookeradd = $_POST["i4"];

    var_dump($email,$category,$gigName,$price,$start,$description,$status,$bookeradd);

    # Add new user
    $dao = new gigDetailsDAO();
    $status = $dao->createBooking($email,$category,$gigName,$price,$start,$description,$status,$bookeradd);
    if($status){
        # Send success message in the session
        $_SESSION["task_success"] = "Success";

        # Redirect to login.php
        # Provide information of the newly registered user 
        # at the back of the URL
        header("location: ../views/Booktask.php");
        exit;
    }
    else{
        echo "Failed to register";
    }
    
    $_SESSION["successUpload1"] = false; 

    if ( isset($_FILES["file"])) {
        // adapted from: https://www.w3schools.com/php/php_file_upload.asp
        $target_dir = "../resources/gigImages";
        $uploadOk = 1;

        // Check if image file is a actual image
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if($check == false) {
          $uploadOk = 0;
        }
        
        // Check file size
        if ($_FILES["file"]["size"] > 2000000) {
          $uploadOk = 0;
        }
        
        // Allow JPG only
        if($_FILES["file"]["type"] !== "image/jpeg") {
          $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk === 1) {
          if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . $gigHIFjhfsk . '.jpg')) {
            $_SESSION["successUpload1"] = true;
            header("Location: ../views/Booktask.php");
            exit();
          }
        }

        header("Location: ../views/Booktask.php");
        exit();
    }
?>