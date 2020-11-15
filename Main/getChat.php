<?php

    require_once "common.php";
    //session_start();
    
    $gigId = $_GET['id'];
    
    //$gigId=1;

    //var_dump($gigId);
    //$email=$_SESSION["email"];
    
    $dao = new ChatDAO();

    $chatArr = $dao->getChat($gigId);
    //var_dump($chatArr);

    $result = array("chat" => array() );

    foreach ($chatArr as $chat) {
        $result["chat"][] = array(
            "chatid" => $chat->getChatId(),
            "sender" => $chat->getSender(),
            "message" => $chat->getMessage(),
            "recipient" => $chat->getRecipient(),
            "msgDateTime" => $chat->getMsgDateTime(),
            "gigId" => $chat->getGigId()          
        );
    }
    

    echo json_encode($result);
 
?>