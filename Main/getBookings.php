<?php
    spl_autoload_register(
        function($class){
            require_once "../model/$class.php";
        }
    );
    session_start();

    
    $dao = new gigDetailsDAO();
    $email=$_SESSION["email"];
  
   
    $gigArray = $dao->getUserBooking($email);

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
            "gigDescription" => $gig->getDescription(),
            "gigStatus" => $gig->getGigStatus(),
            "bookeraddress" => $gig->getBookeraddress(),
            "accepteraddress" => $gig->getAccepteraddress()

          
        );
    }

    echo json_encode($result);
 
?>