<?php
    require_once "../model/common.php";


    $email = $_SESSION["email"];
    $_SESSION["successUpdate"] = false;

    if ( isset($_FILES["file"])) {
        // adapted from: https://www.w3schools.com/php/php_file_upload.asp
        $target_dir = "../resources/profileImages/";
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
        if($_FILES["file"]["type"] !== "image/jpeg"  ) {
          $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk === 1) {
          if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . $email . '.jpg')) {
            $_SESSION["successUpdate"] = true;
            header("Location: ../views/Account.php");
            exit();
          }
        }

        header("Location: ../views/Account.php");
        exit();
    }
 
?>