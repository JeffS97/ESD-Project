<!DOCTYPE html>

<?php
    $_SESSION['Patient_Id'] = 1;
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
</head>

<body>
    <div id="main-container" class="container">
    <h1 class="display-4">View all prescriptions</h1>
    <table id="prescriptionTable" class='table table-striped' border='1'>
            <thead class='thead-dark'>
            <tr>
                <th>Select</th>
                <th>Name of Medication</th>
                <th>Prescription Id</th>
                <th>Appointment Id</th>
                <th>Last Refill Date</th>
                <th>Prescription Expires On</th>
                <th>Refill Interval</th>
                <th>Price</th>
            </tr>
            </thead>
        </table>
    </div>
    <div id='totalAmount' class='d-inline col'>
        <button id='calcButton' type="button" class="btn btn-outline-info" onclick='processMeds()'>Calculate</button>
        <div id='meds'></div>
     </div>
    <script>
    
    const patientId = <?php echo $_SESSION['Patient_Id']?>;
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
        totalAmount.innerText = 'The total bill is $' + totalPrice;


        for (pid in prescriptionIds) {
            $(async () => {
        var serviceURL = "http://localhost:5125/display_possible_refills";

        try {
            const response =
                await fetch(
                    serviceURL, {
                        method: 'POST',
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            "Prescription_Id" : pid
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
            showError('There is a problem retrieving making your refillrequest, please try again later.<br/>' + error);
        } // error
            });
        }

    }


    $(async () => {
        var serviceURL = "http://localhost:5125/display_possible_refills";

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

                   rows += "<tbody><tr>" + eachRow + "</tr></tbody>";
                }
                // add all the rows to the table
                $('#prescriptionTable').append(rows);
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
            showError('There is a problem retrieving prescription data, please try again later.<br/>' + error);
        } // error
    });


    </script>

</body>

</html>
