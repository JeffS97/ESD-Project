<?php
    spl_autoload_register(function($class){
        require_once "../model/$class.php";
    });


    $id=$_GET["id"];
    
    $dao = new gigDetailsDAO();

    $gigArray = $dao->viewBooking($id);
    echo $gigArray[0]->getDescription();
    

    

          
        
   
    
   
 
?>