<?php
    require_once "common.php";

    $dao = new UserDAO();

    $user = $dao->retrieve($email);

    
?>