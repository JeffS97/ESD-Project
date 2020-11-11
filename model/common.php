<?php

spl_autoload_register(
    function ($class){
        require_once  "$class.php";
    }
);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
