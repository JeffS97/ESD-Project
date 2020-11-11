<?php
    # Autoload
    require_once "common.php";
    
    # Start session
    session_start();

    $sender ="admin";
    $receiver ="rohan";
    $datetime = NOW();
    $msg ='Test';

    # Add chat
    $dao = new gigDetailsDAO();
    $status = $dao->addChat($sender, $receiver, $datetime, $msg);

?>