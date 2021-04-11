<!DOCTYPE html>

<?php
    // $_SESSION['Patient_Id'] = 1;
    // session_start();
    require_once "../model/protect.php";
    if( !isset($_GET["aid"]) ){
        echo '<script>alert("Welcome to Geeks for Geeks")</script>';
        header("location:patientViewsAppointmentHistory.php");
        
        exit();
    }
    
?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">

    <title>Prescription</title>

    <link rel="stylesheet" href="">
    <!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Bootstrap libraries -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap" rel="stylesheet">
</head>
<style>
    .fade{
        animation-duration: 1.5s;
    }
    .box_bookings {
        width: fit-content;
        height:fit-content;
        margin: 0px auto 60px;
        background-color: #2b3136       ;
        padding: 0 10px 0px;
        border-radius: 6px;
        box-shadow: 0 5px 7px rgba(0,0,0,0.5);
    }
    body {
        background-image: url("../Main/assets/white.jpg");
        background-size: cover;
        background-repeat: repeat;
        font-family: 'Raleway', sans-serif;
    }
    #error_msg {
        color: white;
        font-weight: bold;
        padding: 20px;
        padding-bottom: 30px;
        text-align: center;
    }
</style>
<body>
    
    <!-- Navbar -->
    <div class="header-middle pt-4 pb-3" style="background-color: white;">
    <div class="container">
        <div class="row">
        <div class="col-md-1 logo">
            <a href="main.php" ><h2>CliniQ</h2></a>
        </div>
        <div class="fiverr-menu" style="margin-left: auto;">
            <ul>
            <li><a class="pro" href="">Home</a></li>
            <li><a href="">Profile</a></li>
            <li><a href="../Main/process_logout.php"><span>Logout</span></a></li>
            </ul>
        </div>
        </div>
    </div>
    </div>

    <!-- Header Bottom Start Here -->
    <div class="header-bottom pt-3" style="background-color: white;">
    <div class="container-fluid">
    <div class="row bottom-menu justify-content-center">
        <ul class="">
            <li><a href="main.php#appointments">View Upcoming Appointments</a></li>
            <li><a href="patientMakesRefillRequest.php">Request Prescription Refill</a></li>
        </ul>
        </div>
    </div>
    </div>

    <div id="main-container" class="container">
        <div class="py-5 text-center animate__animated animate__fadeIn fade">
            <h1 style="text-transform: uppercase; letter-spacing: .2rem; font-weight: bold;" >List of Prescription</h1>
        </div>
        <div class="table-responsive-lg box_bookings animate__animated animate__bounceIn bounce1" style='width: fit-content;'>
            <table id="prescriptionTable" class='table table-borderless'>
                <thead class='thead-dark'>
                    <tr>
                        <th>Select</th>
                        <th>Medication Name</th>
                        <th>Prescription Id</th>
                        <th>Appointment Id</th>
                        <th>Last Refill Date</th>
                        <th>Prescription Expires On</th>
                        <th>Refill Interval</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody id='result'>
                </tbody>
            </table>
            <p id="error_msg"></p>
            <div id="totalAmount" style="text-align: center; color: white; font-weight: bold;">
                <p type='hidden' id='price'></p>
                <button id='calcButton' type="button" class="btn btn-info" style = "height:40px; width:80px; margin-bottom: 20px;" onclick='processMeds()'>Refill</button>
                <div id='meds'></div>
            </div>
        </div>
    </div>
<script>      
    
    const patientId = <?php echo $_SESSION['patient_id']?>;
    console.log(patientId);
    var aid = <?php echo $_GET['aid']?>;

    function showError(message) {
        // Hide the table and button in the event of error
        $('#appointmentTable').hide();
        // $('#addBookBtn').hide();

        // Display an error under the main container
        $('#main-container').append("<label>" + message + "</label>");
    }

    function processMeds() {
        const totalAmount = document.getElementById('totalAmount');
        var totalPrice = 0
        let allMeds = document.getElementsByClassName('med'); 
        var prescriptionIds = []
        for (med of allMeds) {
            console.log('outside')
            if (med.checked) {
                console.log('inside')
                let value = med.getAttribute('name');
                let idPrice = value.split("*");
                let id = idPrice[0];
                let price = idPrice[1];
                totalPrice = 1 * totalPrice + 1*  price;
                prescriptionIds.push(id);
            }
        }
        
        console.log(prescriptionIds);
        console.log(totalPrice);
        
        totalAmount.innerHTML = `<a href='./refillpayment.php?price=${totalPrice}' id='payment type = 'button' class='btn btn-info' style = 'height:40px; width:150px; margin-bottom: 20px;'>Payment: $${totalPrice}</button>`;
        
        


      
            $(async () => {
        var serviceURL = "http://localhost:8000/api/v1/complexprescription/refill"
        

        try {
            const response =
                await fetch(
                    serviceURL, {
                        method: 'PUT',
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            "Prescription_Id" : prescriptionIds
                        })
                    }
                );
            const result = await response.json();
            if (response.status === 200) {
                console.log(result)
               
            } else if (response.status == 404) {
                showError(result.message);
            } else {
                throw response.status;
            }
        } catch (error) {
            // Errors when calling the service; such as network error, 
            // service offline, etc
            // showError('There is a problem retrieving making your refill request, please try again later.<br/>' + error);
           // document.getElementById('error_msg').innerText = "There doesn't seem to be any prescriptions linked to this appointment!";
            $('#calcButton').hide();
        } // error
            });
        }

    


    $(async () => {
        var serviceURL = "http://localhost:8000/api/v1/complexprescription/display_possible_refills";

        try {
            const response =
                await fetch(
                    serviceURL, {
                        method: 'POST',
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            "Appointment_Id" : aid
                        })
                    }
                );
            const result = await response.json();
            if (response.status === 200) {
                // success case
                console.log(result)
                var prescriptions = result.data.prescriptions; //the array is in books within data of 
                // the returned result
                // for loop to setup all table rows with obtained book data
                var rows = "";
                for (const prescription of prescriptions) {
                   eachRow = 
                            "<td>" + `<input class ="med" type="checkbox"` + `name="${prescription.Prescription_Id}*${prescription.Price}"` + `value="${prescription.Price}"` + "</td>" +
                            "<td>" + prescription.Name + "</td>" +
                            "<td>" + prescription.Prescription_Id + "</td>" +
                            "<td>" + prescription.Appointment_Id + "</td>" +
                            "<td>" + prescription.PrevDate.slice(5,17) + "</td>" +
                            "<td>" + prescription.EndDate.slice(5,17) + "</td>" +
                            "<td>" + prescription.Interval_Days + "</td>" + 
                            "<td>" + "$" + prescription.Price + "</td>";

                   rows += "<tr style='color:white;'>" + eachRow + "</tr>";
                   console.log(typeof prescription.PrevDate);
                }
                
                // add all the rows to the table
                $('#result').append(rows);
            } else if (response.status == 404) {
                // No Appointment
                showError(result.message);
            } else {
                // unexpected outcome, throw the error
                throw response.status;
            }
        } catch (error) {
            // Errors when calling the service; such as network error, 
            // service offline, etc
            // showError('There is a problem retrieving prescription data, please try again later.<br/>' + error);
            //document.getElementById('error_msg').innerText = "There doesn't seem to be any prescriptions linked to this appointment!";
            $('#calcButton').hide();
        } // error
    });


    </script>
 <script src="refillindex.js"></script>
</body>

</html>

