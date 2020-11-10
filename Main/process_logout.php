<?php
    # Autoload and start session
    spl_autoload_register(
        function($class){
            require_once "../model/$class.php";
        }
    );
    session_start();
if(isset($_SESSION["email"])){
    unset($_SESSION["email"]);
    header("Location: ../Homepages.php");
}

    ?>