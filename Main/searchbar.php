
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

    if(isset($_POST["searchterm"])){
        
        $searchterm = $_POST["searchterm"];
        $searchterm = strtolower($searchterm);
        $dao = new gigDetailsDAO();

        $gigArray = $dao->getGigs($searchterm);

        $result = array("gig" => array() );

        foreach ($gigArray as $gig) {
            $result["gig"][] = array(
                "gigbooker" => $gig->getGigBooker(),
                "categoryname" => $gig -> getCategoryName(), 
                "gigName" => $gig->getGigName(),
                "gigPrice" => $gig->getGigPrice(),
                "gigStartDate" => $gig->getGigStartDate(),
                "gigEndDate" => $gig->getGigEndDate(),
                "bookeraddress" => $gig->getBookeraddress(),

            
            );
        }

        $result = json_encode($result);
        echo ($result); 
        return ($result);
}
