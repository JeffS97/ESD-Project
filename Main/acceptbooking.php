<?php

spl_autoload_register(function($class){
    require_once "../model/$class.php";
});

$address=$_POST["field"];
$id=$_POST["id"];
session_start();
$dao = new gigDetailsDAO();
$email=$_SESSION["email"];
$gig = $dao->UpdateBooking(date('Y-m-d'),$address,$email,$id);

if($gig==1){
    echo "<script>
    alert('You Have Accepted the Booking !');
    window.location.href='../views/book2.php';
    </script>";
}else{
    echo "<script>
    alert('Could not accept Task !');
    window.location.href='../views/book2.php';
    </script>";
}
#test
?>


