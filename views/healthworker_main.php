<?php
    session_start();
    // echo $_SESSION["username"];
    // echo $_SESSION["role"];
    // echo $_SESSION["email"];
    // echo $_SESSION["fullname"];
    // echo $_SESSION["gid"];
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
    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="navbar.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap" rel="stylesheet">
 
    <!-- Latest compiled and minified JavaScript -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script 
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
    
    <script 
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
    <title>Staff Dashboard</title>
</head>
<style>
.fade{
  animation-duration: 1.5s;
}
.box_bookings {
  width: fit-content;
  height:fit-content;
  /* margin: 0px auto 60px; */
  background-color: #2b3136;
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

</style>
<body>
    <!-- Navbar -->
    <div class="header-middle pt-4 pb-3" style="background-color: white;">
    <div class="container">
        <div class="row">
        <div class="col-md-1 logo">
            <a href="healthworker_main.php" ><h2>CliniQ</h2></a>      
        </div>
        <div class="fiverr-menu" style="margin-left: auto;">
            <ul>
            <li><a class="pro" href="healthworker_main.php">Home</a></li>
            <li><a href="">Profile</a></li>
            <li><a href="../Main/process_logout.php"><span>Logout</span></a></li>
            </ul>
        </div>
        </div>
    </div>
    </div>

    <!-- Header Bottom Start Here -->
    <!-- <div class="header-bottom pt-3">
    <div class="container-fluid">
        <div class="row bottom-menu justify-content-center">
        <ul class="">
            <li><a href="#appointments">View Upcoming Appointments</a></li>
            <li><a href="patientViewsAppointmentHistory.php">View Past Appointments</a></li>
            <li><a href="patientMakesRefillRequest.php">Create Refill Request</a></li>
        </ul>
        </div>
    </div>
    </div> -->
  
    <div class="main_page">
      <div class="container">
        <div id='booking' class="py-5 text-center animate__animated animate__fadeIn fade">
          <h1 style="text-transform: uppercase; letter-spacing: .2rem; font-weight: bold;">Staff Dashboard</h1>
          <!-- <p class="lead">Select a clinic on the map below to make an appointment!</p> -->
        </div> 
      </div> 
      
      <div class="container">

        <div class="row">
          <div class="col-sm-3">
              <!-- <input type='hidden' value="<?php echo 1;?>" id='lol'/> -->
              <label for="calendar" class="mt-2 ml-1">Select a date to proceed</label>
              <input type="date" id='calendar' class="form-control" onchange="getme()" style="width: 80%;">            
          </div>
          <div class="col-sm-9">
            <div id='bookings' class="table-responsive-lg box_bookings animate__animated animate__bounceIn bounce1">
              <span><p style="float: left; font-weight: bold; color: white; padding-top:20px; padding-left: 10px;">Upcoming Appointments</p></span>
              <span><input type="text" id="myInput" onkeyup="myFunction()" placeholder="  Search for names" style="float: right; margin-top: 20px; border: none; border-radius: 8px; margin-right: 10px;"></span>
              <table id='appointments' class='table table-borderless' style="margin-top: 10px; color: white;">
                  <thead>
                  <tr style="border-bottom: 2px solid #17a2b8;">
                    <th>Appointment ID</th>
                    <th>Patient ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Symptoms</th>
                    <th>Completed?</th>
                    <th>View</th>
                    <th>Change Status</th>
                  </tr>
                  </thead>
                  <tbody id='app'></tbody>
              </table>
            </div>

            <div id='bookings2' class="mt-5 table-responsive-lg box_bookings animate__animated animate__bounceIn bounce1">
              <span><p style="float: left; font-weight: bold; color: white; padding-top:20px; padding-left: 10px;">Current Prescriptions</p></span>
              <!-- <span><input type="text" id="myInput2" onkeyup="myFunction()" placeholder="Search" style="float: right; margin-top: 20px; border: none; border-radius: 8px; margin-right: 10px;"></span>     -->
              <table class='table table-borderless' style="margin-top: 10px; color: white;">
                <thead>
                  <tr style="border-bottom: 2px solid #17a2b8;">
                    <th>Prescription ID</th>
                    <th>Medication</th>
                    <th>Collection Date</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id='result'>
                </tbody>
              </table>
            </div>
            </div>
          </div>
          </div>
        </div>

	      <!-- <div class="row"> -->
          
    <!-- </div> -->
        
<script>
    getpres()
    var gid = <?php echo $_SESSION['gid'] ?>;

    $(async() => {      
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0');
      var yyyy = today.getFullYear();
      today = yyyy + '-' + mm + '-' + dd;
      document.getElementById('calendar').value = today;     
      getme();
    });

    function getme(){
    document.getElementById('app').innerHTML="";
    // var gid =document.getElementById('lol').value;
    var apptDate=document.getElementById('calendar').value;
    
    $(async() => {           
        // Change serviceURL to your own
        var serviceURL = "http://localhost:8000/api/v1/complexappointment/worker_views_all_appointments";
        
       console.log(gid);
       console.log(apptDate); 
        try {
               console.log('hello')
            const response =
            await fetch(
                serviceURL, {
                method: 'POST',
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ Gid : gid, ApptDate : apptDate
                })
             });
             const result = await response.json();
         
              if (response.status === 200) {
                 // success case
                 var books = result.data.appointments; //the array is in books within data of 
                 console.log(books);                               // the returned result
                 // for loop to setup all table rows with obtained book data
                 var rows = "";
                 for (const book of books) {
                     var comp="Yes";
                     if(book.Completed==0){
                         comp="No"
                     }
                     console.log(book)
                    eachRow =  "<td>"+book.Appointment_Id+"</td>"+"<td>" + book.Patient_Id + "</td>" +
                    "<td>"+book.ApptDate+"</td>"+
                    "<td>"+book.ApptTime+"</td>"+
                   
                    "<td>"+book.Symptom+"</td>"+
                    "<td>"+comp+"</td>"+
                    "<td>"+"<a href='./createPrescription.php?id="+book.Appointment_Id+"' class=' btn btn-primary btn-sm'>View</a>"+"</td>"
                    if(comp=='No'){
                   eachRow+= "<td>"+`<a href='#' onclick='update(${book.Appointment_Id})' class=' btn btn-primary btn-sm'>Completed</a></td>`
                    }
                    else{
                      eachRow+= "<td>"+"<a href='./createPrescription.php?id="+book.Appointment_Id+"' class=' btn btn-primary btn-sm' style='pointer-events:none;background-color:gray'>Completed</a>"+"</td>"
                    }

                    rows += "<tr>" + eachRow + "</tr>";
                 }
                                 // add all the rows to the table
                                 $('#app').append(rows);
                 } else if (response.status == 404) {
                     // No books
                     showError(result.message);
                 } else {
                     // unexpected outcome, throw the error
                     throw response.status;
                 }
             } catch (error) {
                 // Errors when calling the service; such as network error, 
                 // service offline, etc
                 ('There is a problem retrieving books data, please try again later.<br />' + error);
             } // error
             });

    }
    function update(aid){
      $(async() => {           
        // Change serviceURL to your own
        var serviceURL5 = "http://localhost:8000/api/v1/complexappointment/update_appointment"; 

        try {
              
            const response =
            await fetch(
                serviceURL5, {
                method: 'PUT',
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ Appointment_Id : aid, Gid: gid
                })
             });
             const result = await response.json();
         console.log(response.status)
              if (response.status === 200) {
                 // success case
                 alert("Successfully updated");
                 location.reload()
            
                 } else if (response.status == 404) {
                     // No books
                     showError(result.message);
                 } else {
                     // unexpected outcome, throw the error
                     throw response.status;
                 }
             } catch (error) {
                 // Errors when calling the service; such as network error, 
                 // service offline, etc
                 ('There is a problem retrieving books data, please try again later.<br />' + error);
             } // error
             });  
    }

    function getpres(){

  $(async() => {           
        // Change serviceURL to your own
        var serviceURL9 = "http://localhost:8000/api/v1/complexprescription/healthworker_Get_Uncollected_Prescriptions/0"; 
        try {
            
            
            const response =
            await fetch(
                serviceURL9, {
                method: 'GET'
                // headers: { "Content-Type": "application/json" },
                // body: JSON.stringify({ "Gid" : gid
                // })
             });
             const result = await response.json();
         console.log(response.status)
              if (response.status === 200) {
                 // success case
                 console.log("zzz")
                console.log(result.data.prescriptions)
                var prescription=result.data.prescriptions; 
                rows=""
                count=0
               
                for (let pres of prescription){
                 
                  count++
                 
                  each=`
                    <td>${pres.Prescription_Id}</td>
                    <td>${pres.Name}</td>
                    <td>${pres.PrevDate.slice(0,16)}</td>
                    <td><input type='button' onclick='updateCollected(${pres.Prescription_Id})' class='btn-secondary btn btn-sm' value='Collected'></td>          
                  `
                  rows+="<tr>"+each+"</tr>"
                  console.log(rows)
                }
                $('#result').append(rows);
               
                 } else if (response.status == 404) {
                     // No books
                     showError(result.message);
                 } else {
                     // unexpected outcome, throw the error
                     throw response.status;
                 }
             } catch (error) {
                 // Errors when calling the service; such as network error, 
                 // service offline, etc
                 ('There is a problem retrieving books data, please try again later.<br />' + error);
             } // error
             });  
    
}
function updateCollected(pid){
  $(async() => {           
        // Change serviceURL to your own
        var serviceURL5 = "http://localhost:8000/api/v1/complexprescription/refillcollected"; 
        try {
              
            const response =
            await fetch(
                serviceURL5, {
                method: 'PUT',
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ Prescription_Id : pid
                })
             });
             const result = await response.json();
         console.log(response.status)
              if (response.status === 200) {
                 // success case
                 alert("Successfully updated");
                 location.reload()
            
                 } else if (response.status == 404) {
                     // No books
                     showError(result.message);
                 } else {
                     // unexpected outcome, throw the error
                     throw response.status;
                 }
             } catch (error) {
                 // Errors when calling the service; such as network error, 
                 // service offline, etc
                 ('There is a problem retrieving books data, please try again later.<br />' + error);
             } // error
             });  
}

    function myFunction() {
      // Declare variables
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }

</script>