<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Appointment</title>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" 
    crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
    <script 
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<style>
    body {
            background-image: url("./appt_bg.jpg");
            /* background-repeat: repeat; */
            background-size: cover;
        }
        
    .form-group {
        margin-bottom: 30px;
        width: 80%;
        margin-left: auto;
        margin-right: auto;
    }

    .box {
        width: 70%;
        margin: 140px auto 120px;
        background-color: #fff;
        padding: 0 20px 80px;
        border-radius: 6px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.3);
        text-align: center;
    }

    .header {
        padding: 30px;
        text-align: center;
    }

    .row {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .timeslot {
        padding: 10px 40px 10px 40px
    }

    .radio-toolbar input[type="radio"] {
        opacity: 0;
        position: fixed;
        width: 0;
    }

    .timings {
        /* width: 80%; */
        /* text-align: center; */
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .row {
        justify-content: center;
        display: flex;
        /* background-color: red; */
    }

    #clinic_info {
        text-align: left;
        margin-top: 50px;
    }

    #map {
        border-radius: 6px;
        box-shadow: 0 3px 6px rgba(0,0,0,0.3);
    }

</style>
<body>

    <div class="container animate__animated animate__jackInTheBox box">
        <h2 class="header">Appointment Creation</h2>
        <h3 class="header" style="margin-bottom: -20px;">Hey <span id="pname"></span>!</h3>
        <h3>You're currently making an appointment at:</h3><br>
        
        <div class="row mx-auto">
            <div class="col-sm-6">
                <div id="map" style="width: 100%; height: 300px;"></div>
            </div>
            <div class="col-sm-6">
                <div id="clinic_info"></div>
            </div> 
        </div>

        <form class="needs-validation" novalidate style="margin-top: 30px;" action="server/helper/addUser.php" method="POST" class="form" enctype="multipart/form-data">

            <div class="form-group">
                <label for="symptoms">Symptoms</label>
                <input type="text" id="symptoms" name="symptoms" class="form-control" placeholder='What are your symptoms?' required>
                <div class="invalid-feedback">
                  Symptoms are required.
                </div>
            </div>

            <div>
                Timeslots
                <div class="container timings">

                    <!-- Calendar -->
                    <input class="form-control form-group" type="date" name="i5" value="" id="date"><br>

                    <!-- Timeslots -->
                    <div class="btn-group btn-group-toggle radio-toolbar" id="timeSelection" data-toggle="buttons">
                        <!-- <div class="row">
                            <div class="col-sm-3">
                                <label class="btn btn-outline-primary timeslot" onclick="select_time('12:00')">
                                    <input type="radio" autocomplete="off">12:00
                                </label>
                                <label class="btn btn-outline-primary timeslot" onclick="select_time('12:30')">
                                    <input type="radio" autocomplete="off">12:30
                                </label>
                                <label class="btn btn-outline-primary timeslot" onclick="select_time('13:00')">
                                    <input type="radio"  autocomplete="off">13:00
                                </label>
                                <label class="btn btn-outline-primary timeslot" onclick="select_time('13:30')">
                                    <input type="radio" autocomplete="off">13:30
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="btn btn-outline-primary timeslot" onclick="select_time('14:00')">
                                    <input type="radio" autocomplete="off">14:00
                                </label>
                                <label class="btn btn-outline-primary timeslot" onclick="select_time('14:30')">
                                    <input type="radio" autocomplete="off">14:30
                                </label>
                                <label class="btn btn-outline-primary timeslot" onclick="select_time('15:00')">
                                    <input type="radio" autocomplete="off">15:00
                                </label>
                                <label class="btn btn-outline-primary timeslot" onclick="select_time('15:30')">
                                    <input type="radio" autocomplete="off">15:30
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="btn btn-outline-primary timeslot" onclick="select_time('16:00')">
                                    <input type="radio" autocomplete="off">16:00
                                </label>
                                <label class="btn btn-outline-primary timeslot" onclick="select_time('16:30')">
                                    <input type="radio" autocomplete="off">16:30
                                </label>
                                <label class="btn btn-outline-primary timeslot" onclick="select_time('17:00')">
                                    <input type="radio" autocomplete="off">17:00
                                </label>
                                <label class="btn btn-outline-primary timeslot" onclick="select_time('17:30')">
                                    <input type="radio" autocomplete="off">17:30
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="btn btn-outline-primary timeslot" onclick="select_time('18:00')">
                                    <input type="radio" autocomplete="off">18:00
                                </label>
                                <label class="btn btn-outline-primary timeslot" onclick="select_time('18:30')">
                                    <input type="radio" autocomplete="off">18:30
                                </label>
                                <label class="btn btn-outline-primary timeslot" onclick="select_time('19:00')">
                                    <input type="radio" autocomplete="off">19:00
                                </label>
                                <label class="btn btn-outline-primary timeslot" onclick="select_time('19:30')">
                                    <input type="radio" autocomplete="off">19:30
                                </label>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>

            <div id="selected_timeslot"></div>

            <div class="text-center">
                <button class="btn btn-dark animate__animated animate__fadeInDown" id="confirmBooking" style="margin-top:20px;" type="button">Confirm Booking</button>
            </div>
        
        </form>

    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1iSJyi8nOzkGwMWsmrEDQstq6b22-XoI&libraries=&v=weekly" async></script>
</body>
</html>
<script>
    let map
    var gid = "<?php echo $_GET['gid']?>";
    var patient_id = "<?php echo $_SESSION['patient_id']?>";
    var fullname = "<?php echo $_SESSION['fullname']?>";
    var email = "<?php echo $_SESSION['email']?>";
    document.getElementById('pname').innerText = fullname;
    // console.log(fullname);
    // console.log(email);
    // console.log(gid);
    // console.log(patient_id);
    function select_time(time){
        $('#selected_timeslot').html(`You have selected: ` + time);
    }

    // Create Timeslots when user selects specific date from calendar
    $('#date').change(async() => {
        var timeslots = ["12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30", "18:00", "18:30", "19:00", "19:30"];
        var available_timings = [];
        var serviceURL = 'http://localhost:5001/appointment/healthcareCurrentAppointments';
        var date = document.getElementById('date').value;
        document.getElementById('selected_timeslot').innerText = '';

        try{
            var response = await fetch(
            serviceURL, {
                method: 'POST',
                headers: {"Content-Type": "application/json"},
                body: JSON.stringify({
                    Gid : gid,
                    ApptDate : date
                })
            })

            var result = await response.json();
            
            if(response.status === 200){
                if (result.data.appointments.length != timeslots.length){
                    var timings = [];
                    for (timing of result.data.appointments){
                        timings.push(timing.ApptTime.slice(0,-3));
                    }
                    console.log(timings);

                    for (timing of timeslots){
                        if(!timings.includes(timing)){
                            available_timings.push(timing);
                        }
                    }
                    console.log(available_timings);

                    var timeSelection1 = `
                        <div class="row">
                            <div class="col-sm-3">`;
                    var timeSelection2 = `
                        <div class="row">
                            <div class="col-sm-3">`;
                    // var timeSelection3 = `
                    //     <div class="row">
                    //         <div class="col-sm-3">`;
                    // var timeSelection4 = `
                    //     <div class="row">
                    //         <div class="col-sm-3">`;
                    var middle = Math.floor(available_timings.length/2);
                    var lower_middle = Math.floor(middle/2);
                    var upper_middle = Math.floor((available_timings.length+middle)/2);
                    // console.log(lower_middle);
                    // console.log(upper_middle);
                    // console.log(middle);

                    for (timing of available_timings.slice(0,middle)){
                        timeSelection1 += `
                        <label class="btn btn-outline-primary timeslot" onclick="select_time('${timing}')">
                            <input type="radio" autocomplete="off">${timing}
                        </label>`
                    }

                    // for (timing of available_timings.slice(lower_middle, middle)){
                    //     timeSelection3 += `
                    //     <label class="btn btn-outline-primary timeslot" onclick="select_time('${timing}')">
                    //         <input type="radio" autocomplete="off">${timing}
                    //     </label>`
                    // }

                    for (timing of available_timings.slice(middle)){
                        timeSelection2 += `
                        <label class="btn btn-outline-primary timeslot" onclick="select_time('${timing}')">
                            <input type="radio" autocomplete="off">${timing}
                        </label>`
                    }

                    // for (timing of available_timings.slice(upper_middle)){
                    //     timeSelection4 += `
                    //     <label class="btn btn-outline-primary timeslot" onclick="select_time('${timing}')">
                    //         <input type="radio" autocomplete="off">${timing}
                    //     </label>`
                    // }
                    // console.log(timeSelection1);
                    // console.log(timeSelection2);
                    // var timeSelection1 = timeSelection1 + '</div></div>' + timeSelection3 + '</div></div>' + timeSelection2 + '</div></div>' + timeSelection4 + '</div></div>';
                    var timeSelection1 = timeSelection1 + '</div></div>' + timeSelection2 + '</div></div>';
                    console.log(timeSelection1);
                    $('#timeSelection').html(
                        timeSelection1
                    );
                    console.log("success");
                }
                else {
                    $('#timeSelection').html(
                        'There are no available timeslots! Try another day!'
                    );
                }
            }
            else if(response.status == 400){
                console.log("400");
            }
            else{
                throw response.status;
            }
        }
        catch (error){
            console.log(error);
        }
    })

    // Create Timeslots on initial page load
    $(async() => {
        var timeslots = ["12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30", "18:00", "18:30", "19:00", "19:30"];
        var available_timings = [];
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById('date').value = today;
        console.log(today);

        var serviceURL = 'http://localhost:5001/appointment/healthcareCurrentAppointments';

        try{
            var response = await fetch(
            serviceURL, {
                method: 'POST',
                headers: {"Content-Type": "application/json"},
                body: JSON.stringify({
                    Gid : gid,
                    ApptDate : today
                })
            })

            var result = await response.json();
            console.log(result.data.appointments);
            console.log(result.data.appointments.empty);
            
            if(response.status === 200){
                if (result.data.appointments.length != timeslots.length){
                    var timings = [];
                    for (timing of result.data.appointments){
                        timings.push(timing.ApptTime.slice(0,-3));
                    }
                    console.log(timings);

                    for (timing of timeslots){
                        if(!timings.includes(timing)){
                            available_timings.push(timing);
                        }
                    }
                    console.log(available_timings);

                    var timeSelection1 = `
                        <div class="row">
                            <div class="col-sm-6">`;
                    var timeSelection2 = `
                        <div class="row">
                            <div class="col-sm-6">`;
                    var middle = Math.floor(available_timings.length/2);
                    // console.log(middle);

                    for (timing of available_timings.slice(0,middle)){
                        timeSelection1 += `
                        <label class="btn btn-outline-primary timeslot" onclick="select_time('${timing}')">
                            <input type="radio" autocomplete="off">${timing}
                        </label>`
                    }

                    for (timing of available_timings.slice(middle)){
                        timeSelection2 += `
                        <label class="btn btn-outline-primary timeslot" onclick="select_time('${timing}')">
                            <input type="radio" autocomplete="off">${timing}
                        </label>`
                    }
                    // console.log(timeSelection1);
                    // console.log(timeSelection2);
                    var timeSelection1 = timeSelection1 + '</div></div>' + timeSelection2 + '</div></div>';

                    $('#timeSelection').html(
                        timeSelection1
                    );
                    console.log("success");
                }
                else {
                    $('#timeSelection').html(
                        'There are no available timeslots! Try another day!'
                    );
                }
            }
            else if(response.status == 400){
                console.log("400");
            }
            else{
                throw response.status;
            }
        }
        catch (error){
            console.log(error);
        }
    })

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
                        headers: {"Content-Type": "application/json"},
                        body: JSON.stringify({
                            query
                        })
                    });

            const result = await response.json(); // resolves promise of fetch and parses the response data as a JSON object (if the result was written in JSON format, if not it raises an error)
            // awaiting its promised response. On completion of fetch, the response is triggered and this part of the code waiting for it will be executed. 
            
            if (response.status === 200){
                // success case
                var clinics = result.data.clinics;
                // console.log(clinics);
                for (const clinic of clinics){
                    if (clinic.gid == gid){
                        var clinic_name = clinic.clinic_name;
                        var address = "BLK" + clinic.blk_hse_no + ", " + clinic.street_name;
                        var unit = "#" + clinic.floor_no + "-" + clinic.unit_no;
                        var tel = clinic.tel_no;
                        var postal_cd = clinic.postal_cd;
                        var x = parseFloat(clinic.x);
                        var y = parseFloat(clinic.y);

                        map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 15,
                            center: { lat: y, lng: x},
                        });

                        marker = new google.maps.Marker({
                        position: new google.maps.LatLng(y, x),
                        map: map
                        });

                        var clinic_info = `
                            <p id="clinic_name">Clinic: ${clinic_name}</p>
                            <p>Address: ${address}</p>
                            <p>Postal Code: ${postal_cd}</p>
                            <p>Unit: ${unit}</p>
                            <p>Tel: ${tel}</p>
                        `;

                        $('#clinic_info').html(clinic_info);
                    }
                }
            }
            else if (response.status == 404) {
                // No clinics
                console.log(response.status);
            } 
            else {
                // unexpected outcome, throw the error
                throw response.status;
            }
            
        } 
        catch (error) {
            // Errors when calling the service; such as network error, 
            // service offline, etc
            console.log(error);
        } // error
    });


    $('#confirmBooking').click(async()=>{
        if (document.getElementsByClassName('active')[0] == undefined){
            alert("Please select a valid timeslot!");
            return
        }
        else{
            var clinic_name = document.getElementById('clinic_name').innerText;
            var selectedTime = document.getElementsByClassName('active')[0].innerText;
            var time = document.getElementsByClassName('active')[0].innerText + ':00';
            var symptoms = document.getElementById('symptoms').value;
            var date = document.getElementById('date').value
            console.log("Date: " + date);
            console.log("Symptoms: " + symptoms);
            console.log("Time: " + time);
            console.log("gid: " + gid);

            var serviceURL = 'http://localhost:5100/create_appointment';

            var serviceURL2 = 'http://localhost:5001/appointment/healthcareCurrentAppointments';

            try{
                var response = await fetch(
                serviceURL2, {
                    method: 'POST',
                    headers: {"Content-Type": "application/json"},
                    body: JSON.stringify({
                        Gid : gid,
                        ApptDate : date
                    })
                })

                var result = await response.json();
                
                if(response.status === 200){
                    var timings2 = [];
                    for (timing of result.data.appointments){
                        timings2.push(timing.ApptTime.slice(0,-3));
                    }
                    console.log(timings2);
                    if (timings2.includes(selectedTime)){
                        console.log("Duplicate"); // Send this to error microservice
                        alert('Sorry! This timeslot has just been taken!');
                        location.reload();
                        return
                    }
                }
                else if(response.status == 400){
                    console.log("400");
                }
                else{
                    throw response.status;
                }
            }
            catch (error){
                console.log(error);
            }

            try{
                var response = await fetch(
                serviceURL, {
                    method: 'POST',
                    headers: {"Content-Type": "application/json"},
                    body: JSON.stringify({
                        Patient_Id : patient_id,
                        Gid : gid,
                        Symptom : symptoms,
                        ApptTime : time,
                        ApptDate : date,
                        Completed : 0
                    })
                })

                var result = await response.json();
                console.log(result);

                if(response.status === 200){
                    window.location.href = "confirm.php?name=" + clinic_name + "&time=" + time + "&date=" + date;
                }
                else if(response.status == 400){
                    console.log("400");
                }
                else{
                    throw response.status;
                }
            }
            catch (error){
                console.log(error);
            }
        }
    })

        
</script>


