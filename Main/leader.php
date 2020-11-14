<?php

spl_autoload_register(function($class){
    require_once "../model/$class.php";
});
$dao = new gigDetailsDAO();
$array=$dao->leader();
echo json_encode($array);

?>
