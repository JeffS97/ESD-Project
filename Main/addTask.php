<?php
    # Autoload
    spl_autoload_register(
        function($class){
            require_once "../model/$class.php";
        }
    );
    
    # Start session
    session_start();
    $status=$statusMsg="";
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert = $db->query("INSERT into images (image, uploaded) VALUES ('$imgContent', NOW())"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 

 
// Display status message 
echo $statusMsg; 
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