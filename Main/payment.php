<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paypal Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="style.css">
  
</head>
<style>
    body {
        background-image: url("assets/white.jpg");
        background-size: cover;
        background-repeat: repeat;
    }

    .box_bookings {
        width: fit-content;
        height:fit-content;
        margin: 0px 50px 60px;
        background-color: white;
        padding: 0 10px 0px;
        border-radius: 6px;
        box-shadow: 0 5px 7px rgba(0,0,0,0.5);
    }
</style>

<body>
    <main id="cart-main">
        <div class="container box_bookings animate__animated animate__jackInTheBox">
            <div class="site-title text-center">
                <h1 class="font-title" style="padding-top: 40px;">Appointment Payment</h1>
            </div>
            <div class="grid">
                <div class="col-1">
                    <div class="flex item justify-content-between">
                        <div class="flex">
                          
                            <div class="title">
                                <h3><?php echo $_GET['name']; ?> <br>General Practitioner </h3>
                                <span>Checkup</span><br>
                                <span><?php echo $_GET['date']; ?></span><br>
                                <span><?php echo $_GET['time']; ?></span>
                                <div class="buttons">
                                    <button type="submit"><i class="fas fa-chevron-up"></i> </button>
                                    <input type="text" class="font-title" value="1">
                                    <button type="submit"><i class="fas fa-chevron-down"></i> </button>
                                </div>
                            <input type='hidden' id='name' value=<?php $_GET['name']; ?> >
                            <input type='hidden' id='date' value=<?php $_GET['date']; ?> >
                            <input type='hidden' id='time' value=<?php $_GET['time']; ?> >

                            </div>
                        </div>
                        <div class="price">
                            <h4 class="text-red">Cost of Appointment: $50</h4>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="subtotal text-center">
                        <h3>Price Details</h3>
                        <ul>
                            <li class="flex justify-content-between">
                                <label for="price"> Consultation Fee: </label>
                                <span>$50</span>
                            </li>
                            <li class="flex justify-content-between">
                                <label for="price">Booking Charges: </label>
                                <span>Free</span>
                            </li>
                            <hr>
                            <li class="flex justify-content-between">
                                <label for="price">Amount Payable: </label>
                                <span class="text-red font-title" id='amount'></span>
                            </li>
                        </ul>
                        <div id="paypal-payment-button">
                        </div>
                        
                    </div>
                    <br><br>
                </div>
            </div>
            <div style="text-align: center; padding-bottom: 40px;">
                <input type='button' style='padding: 8px; border-radius: 5px; border: none; background-color: #fca05d;' onclick='redirect()'value='Skip Payment'>
            </div>
        </div>
    </main>

    <script src="https://www.paypal.com/sdk/js?client-id=AXX0I0u6xpgH4HP2P95TV7I55zhG0AThgtQGLfibCiI6YIa1fqFZrMj9mKjoFQAMHkIATjy53Io4n6pp&disable-funding=credit,card"></script>
    <script src="index.js"></script>
</body>
<script>
    var name="<?php echo $_GET['name']; ?>"
    var date="<?php echo $_GET['date']; ?>"
    var time="<?php echo $_GET['time']; ?>"

    function redirect(){
        window.location.href = "../Main/confirm.php?name=" + name + "&time=" + time + "&date=" + date;
    }

 

</script>
</html>