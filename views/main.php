<?php
session_start();
require_once "../model/protect.php";
// $_SESSION['patient_id'] = 1;
$username = $_SESSION["username"];
// echo $_SESSION["username"];
// echo $_SESSION["patient_id"];
// echo $_SESSION["email"];
// echo $_SESSION["fullname"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!-- jsFiddle will insert css and js -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="navbar.css">

    <!-- Latest compiled and minified JavaScript -->
    <!-- jQuery necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <title>CliniQ</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <link rel="stylesheet" href="search.css"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap" rel="stylesheet">
</head>
<style>
    #map {
        height: 100%;
    }

    .custom-map-control-button {
        appearance: button;
        background-color: #fff;
        border: 0;
        border-radius: 10px;
        box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
        cursor: pointer;
        margin: 10px;
        padding: 0 0.5em;
        height: 40px;
        font: 400 18px Helvetica;
        overflow: hidden;
        color: black;
    }

    .custom-map-control-button:hover {
        background: #ebebeb;
    }

    .nav {
        background-color: black !important;
        text-transform: uppercase;
        letter-spacing: .1rem;
    }

    body {
        background-image: url("../Main/assets/white.jpg");
        background-size: cover;
        background-repeat: repeat;
    }

    .box_bookings {
        width: fit-content;
        height: fit-content;
        margin: 0px auto 60px;
        background-color: #2b3136;
        padding: 0 10px 0px;
        border-radius: 6px;
        box-shadow: 0 5px 7px rgba(0, 0, 0, 0.5);
    }

    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: black;
        color: white;
        font-size: small;
    }

    hr {
        background-color: white;
    }

    .profile_pic {
        height: 160px;
        width: 160px;
        border-radius: 50%;
        border: 3px solid #272133;
        margin-top: 20px;
        box-shadow: 0 5px 7px rgba(0, 0, 0, 0.5);
    }

    .card {
        box-shadow: 0 5px 7px rgba(0, 0, 0, 0.5);
    }

    .alert {
        background: #ffdb9b;
        padding: 20px 40px;
        min-width: 420px;
        position: absolute;
        left: 10px;
        top: 80px;
        opacity: 0;
        border-radius: 4px;
        border-left: 4px solid #ffa502;
        z-index: 1;
    }

    .alert .fa-check-circle {
        position: absolute;
        left: 10px;
        top: 30%;
        transform: translativeY(-50%);
        color: #ce8500;
        font-size: 30px;

    }

    .alert .msg {
        padding: 0 20px;
        font-size: 18px;
        color: #ce8500;
    }

    .alert .close-btn {
        position: absolute;
        right: 0px;
        top: 50%;
        transform: translateY(-50%);
        background: #ffd080;
        padding: 20px 18px;
        cursor: pointer;
    }

    .alert .close-btn:hover {
        background: #ffc766;
    }

    .alert.show {
        animation: show_slide 1s ease forwards;
    }

    @keyframes show_slide {
        0% {
            transform: translateX(100%);
        }

        40% {
            transform: translateX(-10%);
        }

        80% {
            transform: translateX(0%);
        }

        100% {
            transform: translateX(-10px);
        }
    }

    .alert.hide {
        animation: hide_slide 1s ease forwards;
        display: none;
    }

    @keyframes hide_slide {
        0% {
            transform: translateX(-10px);
        }

        40% {
            transform: translateX(0%);
        }

        80% {
            transform: translateX(-10%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    .alert.showAlert {
        opacity: 1;
        pointer-events: auto;
    }

    button {
        padding: 8px 16px;
        font-size: 18px;
        font-weight: 200;
        border-radius: 4px;
        border: none;
        outline: none;
        background: #0088CC;
        color: white;
        letter-spacing: 1px;
        cursor: pointer;
    }

    .bounce1 {
        animation-delay: 0.2s;
    }

    .bounce2 {
        animation-delay: 0.4s;
    }

    .bounce3 {
        animation-delay: 0.6s;
    }

    .fade {
        animation-duration: 1.5s;
    }


    .fir-clickcircle {
        height: 80px;
        width: 80px;
        border-radius: 100px;
        margin-left: 30px;
    }

    .fir-image-figure {
        display: flex;
        align-items: center;
        position: relative;
        text-decoration: none;
        margin-bottom: 20px;
        margin-right: 0px;
        /*padding-left:0; 
  padding-right:15px;*/

    }

    .fir-image-figure .caption,
    .fir-image-figure figcaption {
        padding-left: 15px;
    }

    .fir-image-figure .fig-author-figure-title {
        color: var(--fir-color-grey);
        font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
        font-weight: 400;
        font-size: 15px;
        margin-top: 2px;
        width: 200px;
    }

    @media (min-width: 320px) and (max-width: 767px) {
        /* Basically up to, but not including an iPad */

        .alert {
            min-width: 200px;
        }
    }

    @media (min-width: 768px) {

        /* iPad and bigger */
        .alert {
            min-width: 420px;
        }
    }


    .nxm {
        border: none;
        outline: none;
        background: none;
        cursor: pointer;
        color: white;
        padding: 0;
        font-family: inherit;
        font-size: inherit;
        font-weight: bold;
    }

    body {
        font-family: 'Raleway', sans-serif;
    }
</style>

<body>
    <div class="alert hide" style="margin-top: 80px;">
        <i class="fas fa-check-circle fa-1x"></i>
        <span class="msg">Booking removed successfully</span>
        <div class="close-btn">
            <span class="fas fa-times"></span>
        </div>
    </div>

    <!-- Navbar -->
    <div class="header-middle pt-4 pb-3" style="background-color: white;">
        <div class="container">
            <div class="row">
                <div class="col-md-1 logo">
                    <a href="main.php">
                        <h2>CliniQ</h2>
                    </a>

                </div>
                <!-- <div class="col-md-3 fiverr-search" style="margin-left:5px">
            <div class="search-form">
                <div class="form ">
                    <input type="search" placeholder="Find Services">
                    <input class="btn btn-success btn-sm" type="submit" value="Search">
                </div>
            </div>
        </div> -->
                <div class="fiverr-menu" style="margin-left: auto;">
                    <ul>
                        <!-- <button id="telegrambtn" type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#boxModal" onclick="window.open('https://t.me/CliniQueue_Bot?start=<?php echo $_SESSION["username"] ?>')">Get Telegram Notifications!</button> -->
                        <li><a class="pro" href="">Home</a></li>
                        <li><a href="">Profile</a></li>
                        <!-- <li><a href="">History</a></li> -->

                        <li><a href="../Main/process_logout.php"><span>Logout</span></a></li>
                    </ul>
                </div>
                <!-- <div class="col-md-1 profile-pic">
            
        </div> -->
            </div>
        </div>
    </div>

    <!-- Header Bottom Start Here -->
    <div class="header-bottom pt-3" style="background-color: white;">
        <div class="container-fluid">
            <div class="row bottom-menu justify-content-center">
                <ul>
                    <li><a href="#appointments">View Upcoming Appointments</a></li>
                    <li><a href="./patientMakesRefillRequest.php">Request Prescription Refill</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="main_page">
        <div class="container">
            <div id='booking' class="py-5 text-center animate__animated animate__fadeIn fade">
                <h1 style="text-transform: uppercase; letter-spacing: .2rem; font-weight: bold;">Patient Dashboard</h1>
                <p>Select a clinic on the map below to make an appointment!</p>
            </div>

            <!-- Map View -->
            <div class="row">
                <div id="map" style="width: 100%; height: 450px;" class="box_bookings animate__animated animate__bounceIn bounce1"></div>
            </div>

            <div class="row">
                <div id='bookings' class=" col-sm-6 table-responsive-lg box_bookings animate__animated animate__bounceIn bounce2" style='width: fit-content;'>
                    <p style="text-align: center; font-weight: bold; color: white; padding-top:20px;">Upcoming Appointments</p>
                    <table id='appointments' class='table table-borderless' style="margin-top: 10px; color: white;">
                        <thead>
                            <tr style="border-bottom: 2px solid #17a2b8;">
                                <th scope="col">Clinic</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                    <p id="zeroAppointments" style="text-align: center; color: white; margin-bottom: 12px; font-weight: bold;"></p>
                </div>


                <div class="col-sm-6" style='width:fit-content; justify-content:center;'>
                    <div class=" box_bookings animate__animated animate__bounceIn bounce3" style="color: white; padding: 20px 30px;">
                        <p style="text-align: center; font-weight: bold;">Refill Requests</p>
                        <table id='refills' class='table table-borderless' style="margin-top: 10px; color: white;">
                            <thead>
                                <tr style="border-bottom: 2px solid #17a2b8;">
                                    <th scope="col">Medication</th>
                                    <th scope="col">Collection Date</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Clinic</th>
                                </tr>
                            </thead>
                        </table>
                        <p id="zeroRefills" style="text-align: center; color: white; margin-bottom: 12px; font-weight: bold;"></p>
                    </div>

                    <!-- Recommendations -->
                    <div class='box_bookings text-white animate__animated animate__bounceIn bounce3' id='recommendations' style="margin-top: -60px; display: none;">
                        <p style="padding: 20px; text-align: center; font-weight: bold;">Recommendations</p>
                    </div>
                </div> <!-- row-->

            </div>
        </div>

        <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this appointment?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        <button id='confirmDelete' type="button" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="queue" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Queue Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="queue_status">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <label style="visibility:hidden" id="testlabel"><?php echo $_SESSION["username"]; ?></label>
    <div class="modal fade" id="boxModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verify Telegram</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Please click on the close button only once you have typed "/Start" on the telegram bot!
                    https://t.me/CliniQueue_Bot?start (If you accidentally closed it)
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn1" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1iSJyi8nOzkGwMWsmrEDQstq6b22-XoI&libraries=&v=weekly" async></script>

    <script>
        document.getElementById("btn1").addEventListener("click", updateTelegram, false);
        $(async () => {
            var patient_id = "<?php echo $_SESSION['patient_id'] ?>";
            var serviceURL = 'http://localhost:8000/api/v1/complexappointment/patient_views_upcoming_appointment';
            var serviceURL2 = 'http://localhost:8000/api/v1/complexprescription/patient_get_Uncollected_Prescriptions/1';

            // Upcoming Refill Requests
            try {
                var response = await fetch(
                    serviceURL2, {
                        method: 'GET',
                        headers: {
                            "Content-Type": "application/json"
                        }
                    })

                var result4 = await response.json();

                if (response.status === 200) {
                    console.log(result4);
                    var rows2 = "";
                    for (const prescription of result4.data.prescriptions) {
                        var gid = prescription.Gid;
                        var serviceURL3 = 'http://localhost:8080/v1/graphql';
                        var query = `
                    query clinics {
                        clinics{
                            clinic_name
                            gid
                        }
                    }`;
                        try {
                            const response =
                                await fetch(
                                    serviceURL3, {
                                        method: 'POST',
                                        headers: {
                                            "Content-Type": "application/json",
                                            'Accept': 'application/json'
                                        },
                                        body: JSON.stringify({
                                            query
                                        })
                                    });

                            const result3 = await response.json();

                            if (response.status === 200) {
                                // var clinics = result.data.appointments;
                                // console.log(result3)
                                for (clinic of result3.data.clinics) {
                                    if (clinic.gid == gid) {
                                        var eachRow2 = "<td>" + prescription.Name + "</td>" +
                                            "<td>" + prescription.PrevDate.slice(0, 16) + "</td>" +
                                            "<td>" + prescription.Price + "</td>" +
                                            "<td>" + clinic.clinic_name + "</td>"
                                        // console.log(eachRow2);
                                        rows2 += "<tbody><tr class='animate__animated animate__fadeIn fade'>" + eachRow2 + "</tr></tbody>";
                                    }
                                }
                                // rows2 += "<tbody><tr class='animate__animated animate__fadeIn fade'>" + eachRow2 + "</tr></tbody>";
                            } else if (response.status == 404) {
                                console.log(response.status);
                            } else {
                                throw response.status;
                            }
                        } catch (error) {
                            console.log(error);
                        }
                    }
                    // console.log(rows2);
                    if (rows2 === "") {
                        $('#zeroRefills').text('No upcoming refill requests!').css("padding", "20");
                    } else {
                        $('#refills').append(rows2);
                    }
                } else if (response.status == 400 || result.code == 404) {
                    console.log("400");
                } else {
                    throw response.status;
                }
            } catch (error) {
                console.log(error);
            }

            // Upcoming Appointments
            try {
                var response = await fetch(
                    serviceURL, {
                        method: 'POST',
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            Patient_Id: patient_id
                        })
                    })

                var result = await response.json();
                // console.log(result.data.appointments);
                // console.log(result);

                if (response.status === 200 && result.code != 404) {
                    var rows = "";
                    for (const appt of result.data.appointments) {
                        var gid = appt.Gid;
                        var serviceURL3 = 'http://localhost:8080/v1/graphql';
                        var query = `
                    query clinics{
                        clinics{
                            clinic_name
                            gid
                        }
                    }`;
                        try {
                            const response =
                                await fetch(
                                    serviceURL3, {
                                        method: 'POST',
                                        headers: {
                                            "Content-Type": "application/json",
                                            'Accept': 'application/json'
                                        },
                                        body: JSON.stringify({
                                            query
                                        })
                                    });

                            const result2 = await response.json();
                            // console.log(result2);

                            if (response.status === 200) {
                                // var clinics = result.data.appointments;
                                // console.log(result)
                                for (clinic of result2.data.clinics) {
                                    if (clinic.gid == gid) {
                                        // console.log(clinic.gid);
                                        var eachRow = "<td>" + clinic.clinic_name + "</td>" +
                                            "<td>" + appt.ApptDate + "</td>" +
                                            "<td>" + appt.ApptTime.slice(0, 5) + "</td>" +
                                            `<td><button value="${appt.Appointment_Id}" class="open-deleteBooking btn btn-sm" 
                                            type='button' data-toggle="modal" data-target="#confirm">
                                            <i class="fas fa-trash" style="color: white;"></i></button></td>` +
                                            `<td><button class="btn btn-sm btn-warning" type="button" onclick="getQueue(${appt.Appointment_Id}, ${appt.Gid})" data-toggle="modal" data-target="#queue">View Queue</button></td>`;
                                    }
                                }
                                rows += "<tbody><tr class='animate__animated animate__fadeIn fade'>" + eachRow + "</tr></tbody>";
                            } else if (response.status == 404) {
                                console.log(response.status);
                            } else {
                                throw response.status;
                            }
                        } catch (error) {
                            console.log(error);
                        }
                    }
                    $('#appointments').append(rows);
                } else if (response.status == 400 || result.code == 404) {
                    // console.log("400");
                    console.log("No upcoming appointments!");
                    $('#zeroAppointments').text('No upcoming appointments!').css("padding", "20");
                } else {
                    throw response.status;
                }
            } catch (error) {
                console.log(error);
            }

        })

        function updateTelegram() {
            var username = document.getElementById('testlabel').textContent;
            console.log(username);
            var serviceURL = `http://localhost:8000/api/v1/complexappointment/update_telegram/${username}`;
            console.log(serviceURL);

            var response = fetch(
                serviceURL, {
                    method: 'POST',
                    headers: {
                        "Content-Type": "application/json"
                    }
                });
            var result = response.json();
            console.log(result);
        }

        $(document).on("click", '.open-deleteBooking', function() {
            var delete_id = this.value;
            document.getElementById('confirmDelete').value = delete_id;
            //   console.log(delete_id);
        });

        $('#confirmDelete').click(async () => {

            var appt_id = $('#confirmDelete').val();
            console.log(appt_id);

            var serviceURL = 'http://localhost:8000/api/v1/complexappointment/delete_appointment';

            try {
                var response = await fetch(
                    serviceURL, {
                        method: 'DELETE',
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            "Appointment_Id": appt_id
                        })
                    })

                var result = await response.json();
                // console.log(result.data);

                if (response.status === 200) {
                    console.log("Successful cancellation of appointment!")
                    sessionStorage.setItem("showAlert", true);
                    location.reload();
                } else if (response.status == 400) {
                    console.log("400");
                } else {
                    throw response.status;
                }
            } catch (error) {
                console.log(error);
            }
        })

        window.onload = function() {
            if (sessionStorage.getItem("showAlert")) {
                sessionStorage.removeItem("showAlert");
                showAlert();
            }
        }

        function showAlert() {
            var alert = document.getElementsByClassName('alert')[0];
            alert.classList.add('show');
            alert.classList.remove('hide');
            alert.classList.add('showAlert');
            setTimeout(function() {
                alert.classList.remove('show');
                alert.classList.add('hide');
            }, 3000)
            const hideAlert = document.getElementsByClassName("close-btn")[0];
            hideAlert.addEventListener('click', function() {
                alert.classList.remove('show');
                alert.classList.add('hide');
            })
        }

        $(async () => {
            // graphQL endpoint
            var serviceURL = 'http://localhost:8080/v1/graphql';

            // graphQL query
            var query = `{
            clinics {
                x
                y
                gid
                clinic_name
                tel_no
                postal_cd
                blk_hse_no
                floor_no
                unit_no
                street_name
            }
        }`

            try {
                const response =
                    await fetch(
                        serviceURL, {
                            method: 'POST',
                            headers: {
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({
                                query
                            })
                        });

                const result = await response.json(); // resolves promise of fetch and parses the response data as a JSON object (if the result was written in JSON format, if not it raises an error)
                // awaiting its promised response. On completion of fetch, the response is triggered and this part of the code waiting for it will be executed. 

                if (response.status === 200) {
                    // success case
                    var clinics = result.data.clinics;
                    // console.log(clinics)

                    initMap();

                    var infowindow = new google.maps.InfoWindow();
                    var marker, i;

                    // getDistance('103.83', '1.43', '103.8559671', '1.367479014')

                    for (const clinic of clinics) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(clinic.y, clinic.x),
                            map: map
                        });

                        // getDistance('103.83', '1.43', clinic.x, clinic.y);

                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                infowindow.setContent(`<h6>` + clinic.clinic_name + `</h6>
                        <p>Address: BLK ` + clinic.blk_hse_no + `, ` + clinic.street_name + `</p>` +
                                    `<p>Postal Code: ` + clinic.postal_cd + `</p>` +
                                    `<p>Unit: #` + clinic.floor_no + `-` + clinic.unit_no + `</p>` +
                                    `<p>Tel: ` + clinic.tel_no + `</p>` +
                                    `<p id="${clinic.gid}_distance" style="font-weight: bold"></p>` +
                                    `<button style="margin-top: 5px" class="btn btn-danger btn-sm" value="` + clinic.gid + `" onclick='createAppointment(this.value)'>Make a booking</button>` + `
                        <button style="margin-top: 5px" class="btn btn-danger btn-sm" onclick=getDistance(` + clinic.x + "," + clinic.y + "," + clinic.gid + `)>Calculate distance</button>`
                                );
                                infowindow.open(map, marker);
                            }
                        })(marker, i));
                    }
                } else if (response.status == 404) {
                    // No clinics
                    console.log(response.status);
                } else {
                    // unexpected outcome, throw the error
                    throw response.status;
                }

            } catch (error) {
                // Errors when calling the service; such as network error, 
                // service offline, etc
                console.log(error);
            } // error
        });

        function createAppointment(gid) {
            window.location.href = 'createAppointment.php?gid=' + gid;
        }

        function getDistance(end_x, end_y, gid) {
            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer();

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };

                        var start = pos.lat + ", " + pos.lng;
                        var end = end_y + ", " + end_x;
                        // console.log(start);

                        directionsService.route({
                                origin: {
                                    query: start,
                                },
                                destination: {
                                    query: end,
                                },
                                travelMode: google.maps.TravelMode.DRIVING,
                            },
                            (response, status) => {
                                if (status === "OK") {
                                    var directionsData = response.routes[0].legs[0];
                                    // console.log(directionsData.distance.text);
                                    document.getElementById(`${gid}_distance`).innerText = "Distance: " + directionsData.distance.text + " away";
                                    // document.getElementById("durationData").innerHTML = 'The Hero is approximately:</br> <h1>' + directionsData.duration.text + "</h1></br> away from the booker!";
                                    directionsRenderer.setDirections(response);
                                } else {
                                    // document.getElementById("durationData").innerHTML = "<h1> Unable to compute travel time and route due to incorrect address format. <br> Rest assured! your hero is still on his way. </h1>";
                                    window.alert("Directions request failed due to " + status);
                                }
                            }
                        );
                    },
                    () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                    }
                );
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: {
                    lat: 1.3987769644458394,
                    lng: 103.81887771864776
                },
            })
            infoWindow = new google.maps.InfoWindow();
            const locationButton = document.createElement("button");
            locationButton.textContent = "Pan to Current Location";
            locationButton.classList.add("custom-map-control-button");
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);;

            locationButton.addEventListener("click", () => {
                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            };
                            //   infoWindow.setPosition(pos);
                            //   infoWindow.setContent("Location found.");
                            //   infoWindow.open(map);
                            map.setCenter(pos);
                        },
                        () => {
                            handleLocationError(true, infoWindow, map.getCenter());
                        }
                    );
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }
            });
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation ?
                "Error: The Geolocation service failed." :
                "Error: Your browser doesn't support geolocation."
            );
            infoWindow.open(map);
        }

        function getQueue(appt_id, gid) {
            $(async () => {
                var serviceURL = "http://localhost:8000/api/v1/complexappointment/get_Number_Of_People_Ahead";
                try {
                    const response =
                        await fetch(
                            serviceURL, {
                                method: 'POST',
                                headers: {
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    "Appointment_Id": appt_id,
                                    "Gid": gid
                                })
                            }
                        );
                    const result = await response.json();
                    if (response.status === 200) {
                        console.log(result)
                        if (result.count != 0) {
                            $('#queue_status').text("Your current position in queue is: " + result.count);
                        }

                        else {  
                        }
                        //   var num = response.data.count
                    } else if (response.status == 404) {
                        // console.log('no')
                    } else if (response.status == 400){
                        console.log('nope')
                        $('#queue_status').text("You may only view your current queue position on the day of your appointment");
                    }
                    else {

                    }
                } catch (error) {
                    // Errors when calling the service; such as network error, 
                    // service offline, etc
                } // error
            });
        }
    </script>