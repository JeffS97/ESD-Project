<?php
    spl_autoload_register(function($class){
        require_once "../model/$class.php";
    });

    $dao = new gigDetailsDAO();

    $gigArray = $dao->getSomePosts('active');

    $result = array("gig" => array() );

    foreach ($gigArray as $gig) {
        $result["gig"][] = array(
            "gigId" => $gig->getID(),
            "gigbooker" => $gig->getGigBooker(),
            "gigaccepter" => $gig->getGigAccepter(),
            "gigCategory" => $gig->getCategoryName(),
            "gigName" => $gig->getGigName(),
            "gigPrice" => $gig->getGigPrice(),
            "gigStartDate" => $gig->getGigStartDate(),
            "gigEndDate" => $gig->getGigEndDate(),
            "gigDescription" => substr($gig->getDescription(), 0, 21)."...",
            "gigStatus" => $gig->getGigStatus(),
            "bookeraddress" => $gig->getBookeraddress(),
            "accepteraddress" => $gig->getAccepteraddress()

          
        );
    }

    echo json_encode($result);
 
?>