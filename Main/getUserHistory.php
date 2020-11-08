<?php
    require_once "common.php";

    $dao = new gigDetailsDAO();

    // to replace 'glenda' as user session variable.
    $historyArray = $dao->getUserGigsHistory($_SESSION['email']);

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
            "gigStatus" => $history->getGigStatus(),
            "bookeraddress" => $history->getBookeraddress(),
            "accepteraddress" => $history->getAccepteraddress()

          
        );
    }

    echo json_encode($result);
 
?>