
<?php
    // # Autoload
    spl_autoload_register(
        function($class){
            //require_once "../../model/$class.php";
            //require_once "./model/$class.php";
            require_once "../model/$class.php";
        }
    );

    //require_once "../model/common.php";

    session_start();

    if(isset($_GET["searchterm"])){
        
        $searchterm = $_GET["searchterm"];
        $searchterm = strtolower($searchterm);
        $dao = new gigDetailsDAO();

        $gigArray = $dao->getSearch($searchterm);

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
       
}
