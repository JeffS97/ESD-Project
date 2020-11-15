<?php
    # Autoload
    require_once "common.php";
    
    # Start session
    session_start();
    /*
    $sender ="rohan@gmail.com";
    $receiver ="admin@gmail.com";
    $datetime = '2020-11-13 11:11:11';
    $msg ='Tefsdfsst';
    $gigId = 1;
    */
    
    /*
    $rp = json_decode(file_get_contents('php://input'), true);
    var_dump($rp);
    */
    /*
    //var_dump($_POST);
    $sender = $_POST['sender'];
    $receiver = $_POST['receiver'];
    $datetime = $_POST['datetime'];
    $msg = $_POST['msg'];
    $gigId = $_POST['gigId'];
    */

    $sender = $_GET['sender'];
    $recipient = $_GET['recipient'];
    $msg = $_GET['message'];
    $gigId = $_GET['gigId'];


    # Add chat
    $dao = new ChatDAO();
    $status = $dao->addChat($sender, $recipient, $msg, $gigId) ;

    $url = "Location:: ../views/Chat.php?id='{$gigId}'";
    //header($url);
    
?>