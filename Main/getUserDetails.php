<?php
    require_once "common.php";

    $email = $_SESSION["email"];

    $dao = new UserDAO();

    $user = $dao->retrieve($email);

    $result = array(
        "email" => $user->getEmail(),
        "password"=> $user->getPassword(),
        "fullname"=> $user->getFullname(),
        "username" => $user->getUsername()
    );
    
    header('Content-Type: application/json');
    echo json_encode($result);
?>