
<?php

    require_once "common.php";
    $id= $_GET["id"];
    $dao = new gigDetailsDAO();
    $result=$dao->Complete(date('Y-m-d H:i:s'),$id);
    if($result==1){
        echo "<script>
        alert('Hooray ! Task Completed!');
        window.location.href='../views/book2.php';
        </script>";
    }
    else{
        echo "<script>
    alert('Error in marking as complete!');
    window.location.href='../views/book2.php';
    </script>";
    }

?>