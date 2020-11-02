<?php
    spl_autoload_register(function($class){
        require_once "../model/$class.php";
    });


    session_start();

    $dao = new gigDetailsDAO();
    $email=$_SESSION["email"];
  
    $gigArray = $dao->getEarnings($email);

    $result = array("earnings" => array() );

    foreach ($gigArray as $gig) {
        $result["earnings"][] = array(
        
           
            "gigEndDate" => $gig[1],
            "gigPrice" => $gig[0]
            
       
          
        );
    break;
    }

    echo json_encode($result);
 
?>