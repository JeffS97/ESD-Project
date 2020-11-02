<?php
    require_once "common.php";

    $email = "admin@gmail.com";

    $dao = new UserDAO();

    $user = $dao->retrieve($email);

    $result = array(
        "email" => $user->getEmail(),
        "password"=> $user->getPassword(),
        "fullname"=> $user->getFullname(),
        "username" => $user->getUsername()
    );
    
    echo json_encode($result);
?>