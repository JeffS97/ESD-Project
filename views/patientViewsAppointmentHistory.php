<!DOCTYPE html>

<?php
    session_start();
    $_SESSION['Patient_Id'] = 1;
    $_SESSION['Gid'] = 1;

// if(isset($_SESSION['Patient_Id'] && isset($_SESSION['Gid'])) {
//     }
?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">

    <title>Appointment History</title>

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
        <h1 class="display-4">Appointment History</h1>
        <table id="appointmentTable" class='table table-striped' border='1'>
            <thead class='thead-dark'>
                <tr>
                    <th>Appointment Id</th>
                    <th>Clinic Visited</th>
                    <th>Ailment</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Book Now?</th>
                </tr>
            </thead>
        </table>
        <!-- <input name="apptId" type="text" id="apptId">
        <a id="addBookBtn" class="btn btn-primary" href="refill.php">Add a book</a> -->
    </div>
    <script>
    const patientId = <?php echo $_SESSION['Patient_Id'] ?>;
    const Gid = <?php echo $_SESSION['Gid'] ?>;

    // Place holder in case of revert

    // currently hardcoded appointment
    // how to retrieve value from input
    // var appt_Id = $('#apptId').val();
    // //var appt_Id = document.getElementById('apptId').value
    // console.log("testing")
    // console.log(appt_Id + "noooo")
    // console.log("HELLO")
    // // Helper function to display error message

    function showError(message) {
        // Hide the table and button in the event of error
        $('#appointmentTable').hide();
        // $('#addBookBtn').hide();

        // Display an error under the main container
        $('#main-container').append("<label>" + message + "</label>");
    }

    // anonymous async function 
    // - using await requires the function that calls it to be async

    $(async () => {
        var serviceURL = "http://localhost:5100/patient_views_appointment_history";

        try {
            const response =
                await fetch(
                    serviceURL, {
                        method: 'POST',
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            Patient_Id : patientId,
                            Gid : Gid
                        })
                    }
                );
            const result = await response.json();
            if (response.status === 200) {
                // success case
                console.log(result)
                var appointments = result.data.appointments; //the array is in books within data of 
                // the returned result
                // for loop to setup all table rows with obtained book data
                var rows = "";
                for (const appointment of appointments) {
                    eachRow ="<td>" + appointment.Appointment_Id + "</td>" +
                            "<td>" + appointment.Gid + "</td>" +
                            "<td>" + appointment.Symptom + "</td>" +
                            "<td>" + appointment.ApptDate + "</td>" +
                            "<td>" + appointment.ApptTime + "</td>" +
                            "<td>"+"<a href='./viewPrescription2.php?aid="+appointment.Appointment_Id+"' class=' btn btn-primary'>View</a>"+"</td>"

                    rows += "<tbody><tr>" + eachRow + "</tr></tbody>";
                }

                // add all the rows to the table
                $('#appointmentTable').append(rows);
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
            showError('There is a problem retrieving appointment data, please try again later.<br/>' + error);
        } // error
    });
    </script>

</body>

</html>