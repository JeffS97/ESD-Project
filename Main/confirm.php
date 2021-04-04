<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<title>Appointment Confirmation</title>

<style>
    
    container-fluid {
        display: flex;
        justify-content: center;
    }

    .fa-check-circle{
        color: green;
        z-index: 1;
    }

    body {
        background-image: url("assets/white.jpg");
        background-repeat: repeat;
        background-size: cover;
    }

    .box {
        width: 50%;
        margin: 200px auto 120px;
        background-color: #fff;
        padding: 0 20px 80px;
        border-radius: 6px;
        box-shadow: 0 3px 7px rgba(0,0,0,0.3);
        text-align: center;
    }

    .confirmation {
        border-radius: 100px;
        overflow: hidden;
        height: 150px;
        width: 150px;
        position: relative;
        margin: auto;
        top: -60px;
        box-shadow: 0 0 0 8px #f0f0f0;
    }

    .bounce {
        animation-duration: 5s;
    }

    h3 {
        font-size: 3.0vh;
    }

    span {
        font-weight: bold;
    }

</style>
</head>

  <body>
    <div class="box container-fluid animate__animated animate__bounceIn bounce">
        <div class="confirmation">
            <i class="fas fa-check-circle fa-9x"></i>
        </div>

        <div>
            <h3 class="text-center">Your medical appointment at <span id="clinic_name"></span> on <span id="date"></span>, <span id="time"></span> has been confirmed</h3>
        </div>
            <br>
            <br>
        <h3>Redirecting you to the main page</h3>
    </div>
    
    <script>
        var clinic_name = "<?php echo $_GET['name'] ?>";
        var date = "<?php echo $_GET['date'] ?>";
        var time = "<?php echo $_GET['time'] ?>";
        document.getElementById('date').innerText = date;
        document.getElementById('time').innerText = time.slice(0,-3);
        document.getElementById('clinic_name').innerText = clinic_name.slice(8);

        window.onload = redirect;
        
        function redirect() {
            setTimeout(function () {
                window.location.href = "../views/main.php"; 
            }, 5000);
        } 
        
    </script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>
</html>