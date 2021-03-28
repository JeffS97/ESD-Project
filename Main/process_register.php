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
    if($_POST["doctor"]){
        $email = $_POST["demail"];
        $password = $_POST["dpassword"];
        $fullname = $_POST["dfullname"];
        $clinic = $_POST["dclinics"];
        $clinic = explode('.', $clinic);
        $role = $_POST["doctor"];
        $gid = $clinic[0];
        $clinic_name = $clinic[1];
        $address = $clinic[2];

        # Hash entered password
        $hashed = password_hash($password, PASSWORD_DEFAULT);
    
        # Add new user
        $dao = new UserDAO();
        $dao->addClinic($gid, $clinic_name, $address);
        $status = $dao->addHealthworker($email, $fullname, $hashed, $role, $gid);
        echo $status;
        if($status){
            # Send success message in the session
            $_SESSION["success"] = "Registration Successful";
            $_SESSION["email"] = $email;
            $_SESSION["fullname"] = $fullname;
    
            # Redirect to login.php
            # Provide information of the newly registered user 
            # at the back of the URL
            header("location: ../Homepage.php");
            exit;
        }
        else{
            echo "Failed to register doctor.";
        } 
    }
    elseif($_POST["nurse"]){
        $email = $_POST["nemail"];
        $password = $_POST["npassword"];
        $fullname = $_POST["nfullname"];
        $clinic = $_POST["nclinics"];
        $clinic = explode('.', $clinic);
        $role = $_POST["nurse"];
        $gid = $clinic[0];
        $clinic_name = $clinic[1];
        $address = $clinic[2];


        # Hash entered password
        $hashed = password_hash($password, PASSWORD_DEFAULT);
    
        # Add new user
        $dao = new UserDAO();
        $dao->addClinic($gid, $clinic_name, $address);
        $status = $dao->addHealthworker($email, $fullname, $hashed, $role, $gid);
        echo $status;
        if($status){
            # Send success message in the session
            $_SESSION["success"] = "Registration Successful";
            $_SESSION["email"] = $email;
            $_SESSION["fullname"] = $fullname;
    
            # Redirect to login.php
            # Provide information of the newly registered user 
            # at the back of the URL
            header("location: ../Homepage.php");
            exit;
        }
        else{
            echo "Failed to register nurse.";
        } 
    }
    else{
        $email = $_POST["email"];
        $password = $_POST["password"];
        $fullname = $_POST["fullname"];
        $age = $_POST["age"];
        $allergy = $_POST["allergy"];
        $address = $_POST["address"];
    
        # Hash entered password
        $hashed = password_hash($password, PASSWORD_DEFAULT);
    
        # Add new user
        $dao = new UserDAO();
        $status = $dao->add($email,$hashed,$fullname,$age,$allergy,$address);
        echo $status;
        if($status){
            # Send success message in the session
            $_SESSION["success"] = "Registration Successful";
            $_SESSION["email"] = $email;
            $_SESSION["fullname"] = $fullname;
    
            # Redirect to login.php
            # Provide information of the newly registered user 
            # at the back of the URL
            header("location: ../Homepage.php");
            exit;
        }
        else{
            echo "Failed to register patient.";
        
        } 
    }
?>