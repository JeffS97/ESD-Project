<?php
    require_once "common.php";
    session_start();
    $dao = new gigDetailsDAO();
    
    $email=$_SESSION["email"];
    // to replace 'glenda' as user session variable.
    $historyArray = $dao->getUserGigsHistory($email);

    $result = array("userhistory" => array() );

    foreach ($historyArray as $history) {
        $result["userhistory"][] = array(
            "gigId" => $history->getID(),
            "gigbooker" => $history->getGigBooker(),
            "gigaccepter" => $history->getGigAccepter(),
            "gigName" => $history->getGigName(),
            "gigPrice" => $history->getGigPrice(),
            "gigStartDate" => $history->getGigStartDate(),
            "gigEndDate" => $history->getGigEndDate(),
            "gigDescription" => $history->getDescription(),
            "gigStatus" => $history->getGigStatus(),
            "bookeraddress" => $history->getBookeraddress(),
            "accepteraddress" => $history->getAccepteraddress()

          
        );
    }

    echo json_encode($result);
 
?>