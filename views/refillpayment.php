<?php require_once "../model/protect.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paypal Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- <link rel="stylesheet" href="style.css"> -->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</head>
<style>
    body {
        background-image: url("../Main/assets/white.jpg");
        background-size: cover;
        background-repeat: repeat;
        font-family: 'Raleway', sans-serif;
    }

    .box_bookings {
        width: fit-content;
        height:fit-content;
        /* margin: 0px 50px 60px; */
        margin: 65px auto 60px;
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
                <h1 class="font-title" style="padding-top: 40px; text-align: center; font-weight: bold;">Refill Payment</h1>
            </div>
            <div class="grid">
                <div class="col-1">
                    <div class="flex item justify-content-between">
                        <div class="flex">
                          
                            
                        
                        <div class="price">
                            <h4 class="text-red">Cost of Appointment: <?php echo $_GET['price'];?></h4>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="subtotal text-center">
                        <h3>Price Details</h3>
                        <ul>
                            <li class="flex justify-content-between">
                                <label for="price"> Refill Amount: </label>
                                <span>$<?php echo $_GET['price'] ?></span>
                            </li>
                            <li class="flex justify-content-between">
                                <label for="price">Booking Charges: </label>
                                <span>Free</span>
                            </li>
                            <hr>
                            <li class="flex justify-content-between">
                                <label for="price">Amount Payable: </label>
                                <span class="text-red font-title" id='amount'></span>
                                <input type='hidden' id='pay'>
                                <input type="hidden" id="patientid">
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
    <script>$('#patientid').val(<?php echo $_SESSION['patient_id']?>);</script>
    <script src="https://www.paypal.com/sdk/js?client-id=AXX0I0u6xpgH4HP2P95TV7I55zhG0AThgtQGLfibCiI6YIa1fqFZrMj9mKjoFQAMHkIATjy53Io4n6pp&disable-funding=credit,card"></script>
    <script src="refillindex.js"></script>
</body>
<script>
    function redirect(){
        window.location.href = "./main.php";
    }

    $(async () => {
        var serviceURL = "http://localhost:8000/api/v1/complexprescription/getPrice";
        // let num = <?php echo $_SESSION['patient_id']?>;
        // var Patient_Id = num.toString();
        try {
            const response =
                await fetch(
                    serviceURL, {
                        method: 'POST',
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            Patient_Id : patientId
                        })
                    }
                );
            const result = await response.json();
            if (response.status === 200) {
                // success case
                console.log(result)
                var price = result.data.payment; //the array is in books within data of 
                // the returned result
                // for loop to setup all table rows with obtained book data
               
                // add all the rows to the table
                document.getElementById('pay').value=price.Price
                document.getElementById('amount').innerHTML="$"+price.Price
            } else if (response.status == 404) {
                // No Appointment
                // showError(result.message);
                console.log(response);
            } else {
                // unexpected outcome, throw the error
                throw response.status;
            }
        } catch (error) {
            // Errors when calling the service; such as network error, 
            // service offline, etc
            // showError('There is a problem retrieving price data, please try again later.<br/>' + error);
            console.log(error);
        } // error
    });

</script>
</html>