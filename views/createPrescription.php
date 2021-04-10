<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script 
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" 
    crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="navbar.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap" rel="stylesheet">

    <style>
        .fade{
            animation-duration: 1.5s;
        }

        .box_bookings {
            width: fit-content;
            height:fit-content;
            margin: 0px auto 60px;
            background-color: #2b3136;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 5px 7px rgba(0,0,0,0.5);
            color: white;
        }

        body {
            background-image: url("../Main/assets/white.jpg");
            background-size: cover;
            background-repeat: repeat;
            font-family: 'Raleway', sans-serif;
        }

        .bounce1 {
            animation-delay: 0.2s;
        }
        .bounce2{
            animation-delay: 0.4s;
        }
    </style>

    <title>Create Prescription</title>
</head>
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

    <!-- <div class="container my-5">
        <div class="modal" id="myModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Task Submitted</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                    </div>
                    <div class="modal-body">
                        <p>Your task has been submitted for our Heroes to accept!</p>
                        <p><a href = "book2.php">Click here</a> to see your listing</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> -->
           
      
        <div class="container">
            <div id='booking' class="py-5 text-center animate__animated animate__fadeIn fade">
            <h1 style="text-transform: uppercase; letter-spacing: .2rem; font-weight: bold;">Create a Prescription</h1>
            <!-- <p class="lead">Select a clinic on the map below to make an appointment!</p> -->
            </div> 
        </div> 

        <div class="container">
            <div class="row">
                <div class="box_bookings col-sm-4 animate__animated animate__bounceIn bounce1">
                    <h5 style="border-bottom: 2px solid #17a2b8; padding-bottom: 10px;">Appointment Details</h5>
                    <p class="text-left" id="appointment" style="padding-top: 8px;"></p>
                    <div id='prescription'></div>
                </div>

                <div class="col-sm-1"></div>

                <div class="box_bookings col-sm-7 animate__animated animate__bounceIn bounce2">
                    <!-- <img class="card-img-top" src="plumb.jpg" alt="Card image" style="height:100%;">
                    <div class="card-img-overlay"> -->
                    <form novalidate="" method="POST" id="bootstrapForm" enctype="multipart/form-data">
                    <h5 style="border-bottom: 2px solid #17a2b8; padding-bottom: 10px;">Prescription Details</h5>
                        <div class="form-group" style="padding-top: 8px;">
                            <label class="h6 form-control-label" for="input2">Name of Medication<abbr class="text-danger" title="This is required">*</abbr></label>
                            <textarea class="form-control" name="i2" id="input2" rows="2" placeholder="" required></textarea>
                            <div class="invalid-feedback">Please enter a task description. This field is required</div>
                        </div>
                        <div class="form-group">
                            <label class="h6 form-control-label" for="input22">Patient ID<abbr class="text-danger" title="This is required">*</abbr></label>
                            <input type="text" class="form-control" name="i7" id="input22"  placeholder=" " required></textarea>
                            <div class="invalid-feedback">Please enter a task title. This field is required</div>
                        </div>
                        <div class="form-group">
                            <label class="h6 form-control-label" for="input7">Prescription Creation Date<abbr class="text-danger" title="This is required">*</abbr></label>
                            <input type="date" class="form-control" name="i7" id="input7"  placeholder="House Cleaning" required></textarea>
                            <div class="invalid-feedback">Please enter a task title. This field is required</div>
                        </div>
                        <div class="form-group">
                            <label class="h6 form-control-label" for="input777">Prescription End Date<abbr class="text-danger" title="This is required">*</abbr></label>
                            <input type="date" class="form-control" name="i777" id="input777"  placeholder="" required></textarea>
                            <div class="invalid-feedback">Please enter a task title. This field is required</div>
                        </div>
                        <div class="form-group">
                            <label class="h6 form-control-label" for="input77">Prescription Interval<abbr class="text-danger" title="This is required">*</abbr></label>
                            <br>  
                            <select id="input77">
                                <?php for ($i=1; $i<=100; $i++){ ?> <option value="<?php echo $i;?>"><?php echo $i;?></option> <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="h6 form-control-label" for="input3">Cost of Medicine<abbr class="text-danger" title="This is required">*</abbr></label>
                            <div class="input-group mb-3">
                                
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                </div>
                                <input type="text" placeholder="10.00" class="form-control" name="i3" id="input3" required>
                                <div class="invalid-feedback">Please enter a valid price like 6.50. This field is required.</div>
                            </div>
                        </div>
                        <div style="text-align: center;">
                            <button type="button" class="btn btn-danger" style="border-radius:30px; margin-top: 30px; margin-bottom: 20px;" onclick="getx()" id="submit-btn">Create Prescription</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>

    <script>
        <?php if (isset($_SESSION['task_success'])) { 
            unset($_SESSION['task_success']);?>
            
            $('#myModal').modal();
        <?php } ?>

        $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        // $("#bootstrapForm").submit(function(event) {
        //     var vForm = $(this);
        //     var dataString = $(this).serialize();
        //     vForm.addClass('was-validated');

        //     if (vForm[0].checkValidity() === false) {
        //         event.preventDefault()
        //         event.stopPropagation()
        //     } 
        // });
            // currently hardcoded appointment
            // how to retrieve value from input
            var appt_Id = $('#apptId').val();
            // var appt_Id = document.getElementById('myInput').value;
            console.log("testing")
            console.log(appt_Id + "noooo")
            // console.log("HELLO")
            // $(document).ready(function(){
            //     // Get value on button click and show alert
            //     $("#myBtn").click(function(){
            //     var str = $("#myInput").val();
            //     alert(str);
            //     console.log(str);
            // });
            // });
            
            // // Helper function to display error message
            function showError(message) {
                // Hide the table and button in the event of error
                $('#booksTable').hide();
                $('#addBookBtn').hide();
        
                // Display an error under the main container
                $('#main-container')
                    .append("<label>"+message+"</label>");
            }
        
   
                var ans=<?php echo $_GET['id'];?>;
                // var medication = document.getElementById("input2").value;
                // var creationdate = document.getElementById("input7").value;
                // var enddate = document.getElementById("input777").value;
                // var interval = document.getElementById("input8").value;
                // var patientid = document.getElementById("input22").value;
                // var cost = document.getElementById("input3").value;
                
                
                console.log(ans + "functionhere")  
            
                $(async() => {           
                // Change serviceURL to your own
                var serviceURL = "http://localhost:8000/api/v1/complexappointment/view_by_appointment";
                var serviceURL1 = "http://localhost:8000/api/v1/complexprescription/display_possible_refills";

                
                try {
                
                    
                    console.log(ans);

                    const response =
                    await fetch(
                    serviceURL, { method: 'POST',
                    headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({ Appointment_Id : ans})
        }
                    );
                    const result = await response.json();
                    if (response.status === 200) {
                        // success case
                        console.log(result)
                        var appts = result.data; //the array is in books within data of 
                                                    // the returned result
                        // for loop to setup all table rows with obtained book data
                        var rows = "";
                        var comp="Yes";
                        if(appts.Completed==0){
                         comp="No"}
                        eachRow =
                                    "Appointment ID: " + appts.Appointment_Id + "<br>" +
                                    "Appointment Date: " + appts.ApptDate + "<br>" +
                                    "Appointment Time: " + appts.ApptTime.slice(0,5) + "<br>" +
                                    "Completed: " + comp + "<br>" +
                                    "Patient ID: " + appts.Patient_Id+ "<br>" +
                                    "Symptoms: " + appts.Symptom + "<br>"
                                    ;
                    
                        
                            // add all the rows to the table
                            document.getElementById('appointment').innerHTML=eachRow
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
                        showError
                        ('There is a problem retrieving books data, please try again later.<br />' + error);
                        } // error
                
            //getting prescription list
            try {
                
                    
                console.log(ans);

                const response =
                await fetch(
                serviceURL1, { method: 'POST',
                headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ Appointment_Id : ans})
    }
                );
                const result = await response.json();
                if (response.status === 200) {
                    // success case
                    console.log(result)
                    var appts = result.data; //the array is in books within data of 
                                                // the returned result
                    // for loop to setup all table rows with obtained book data
                    var rows = "";
                    var comp="Yes";
                    if(appts.Completed==0){
                     comp="No"}
                     var prescriptions = result.data.prescriptions; //the array is in books within data of 
                                               // the returned result
                // for loop to setup all table rows with obtained book data
                var rows = "";
                for (const prescription of prescriptions) {
                   eachRow =`
                   <div class="card" style="width: 500px;">
                  
              
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-left">`+prescription.Name+` <a href="#" class="btn btn-primary" onclick= "deleteMe(${prescription.Prescription_Id})" style="margin-left:120%">Cancel Prescription</a>`+`</h5>
                        <p class="card-text text-left">`+prescription.PrevDate+"<br>"+ prescription.EndDate+"<br>"+  prescription.Interval_Days +`</p>
                       
                    </div>
              
                 </div>
            </div>`
                   
                  
                   rows += eachRow;
                }
                    // add all the rows to the table
                   document.getElementById('prescription').innerHTML=rows
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
                showError
                ('There is a problem retrieving books data, please try again later.<br />' + error);
                } // error
            
            
            });
            // delete prescription
            function deleteMe(id){
                console.log("workingdude");

                $(async() => {           
                    // Change serviceURL to your own
                    //var serviceURL = "http://127.0.0.1:5100/view_by_appointment";
                    //var serviceURL1 = "http://127.0.0.1:5105/display_possible_refills";
                    var serviceURL4 = "http://localhost:8000/api/v1/complexprescription/delete_prescription";
                    
                
                    try {
                    
                        
                  
                    const response =
                    await fetch(
                    serviceURL4, { method: 'DELETE',
                    headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({Prescription_Id:id})
        }
                    );
                  
                    const result = await response.json();
                    if (response.status === 200) {
                        // success 
                        alert('Prescription Cancelled');
                        location.reload();
                        console.log("WellDone"); // THIS DOESNT PRINT FXXXXXXK
                       
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
                    showError
                    ('There is a problem retrieving books data, please try again later.<br />' + error);
                    } // error
                
                
                });
            }
                    
                
      
            //anonymous async function 
            //using await requires the function that calls it to be async
            function getx(){
                var medication = document.getElementById("input2").value;
                var creationdate = document.getElementById("input7").value;
                var enddate = document.getElementById("input777").value;
                var interval = document.getElementById("input77").value;
                var patientid = document.getElementById("input22").value;
                var cost = document.getElementById("input3").value;
                var gid= <?php echo $_SESSION['gid'] ?>;

                $(async() => {           
                    // Change serviceURL to your own
                    //var serviceURL = "http://127.0.0.1:5100/view_by_appointment";
                    //var serviceURL1 = "http://127.0.0.1:5105/display_possible_refills";
                    var serviceURL3 = "http://localhost:8000/api/v1/complexprescription/add_Prescription";
                    console.log(medication);
                    console.log(cost);
                    console.log(creationdate);
        //             try {
                    
                        
        //                 console.log(ans);

        //                 const response =
        //                 await fetch(
        //                 serviceURL, { method: 'POST',
        //                 headers: { "Content-Type": "application/json" },
        //                     body: JSON.stringify({ Appointment_Id : ans})
        //     }
        //                 );
        //                 const result = await response.json();
        //                 if (response.status === 200) {
        //                     // success case
        //                     console.log(result)
        //                     var appts = result.data; //the array is in books within data of 
        //                                                 // the returned result
        //                     // for loop to setup all table rows with obtained book data
        //                     var rows = "";
        //                     var comp="Yes";
        //                     if(appts.Completed==0){
        //                     comp="No"}
        //                     eachRow =
        //                                 "Appointment ID: " + appts.Appointment_Id + "<br>" +
        //                                 "Appointment Date: " + appts.ApptDate + "<br>" +
        //                                 "Appointment Time: " + appts.ApptTime + "<br>" +
        //                                 "Completed: " + comp + "<br>" +
        //                                 "Patient ID: " + appts.Patient_Id+ "<br>" +
        //                                 "Symptom: " + appts.Symptom + "<br>"
        //                                 ;
                        
                            
        //                         // add all the rows to the table
        //                         document.getElementById('appointment').innerHTML=eachRow
        //                     } else if (response.status == 404) {
        //                         // No books
        //                         showError(result.message);
        //                     } else {
        //                         // unexpected outcome, throw the error
        //                         throw response.status;
        //                     }
        //                 } catch (error) {
        //                     // Errors when calling the service; such as network error, 
        //                     // service offline, etc
        //                     showError
        //                     ('There is a problem retrieving books data, please try again later.<br />' + error);
        //                     } // error
                    
        //         //getting prescription list
        //         try {
                    
                        
        //             console.log(ans);

        //             const response =
        //             await fetch(
        //             serviceURL1, { method: 'POST',
        //             headers: { "Content-Type": "application/json" },
        //                 body: JSON.stringify({ Appointment_Id : ans})
        // }
        //             );
        //             const result = await response.json();
        //             if (response.status === 200) {
        //                 // success case
        //                 console.log(result)
        //                 var appts = result.data; //the array is in books within data of 
        //                                             // the returned result
        //                 // for loop to setup all table rows with obtained book data
        //                 var rows = "";
        //                 var comp="Yes";
        //                 if(appts.Completed==0){
        //                 comp="No"}
        //                 var prescriptions = result.data.prescriptions; //the array is in books within data of 
        //                                         // the returned result
        //             // for loop to setup all table rows with obtained book data
        //             var rows = "";
        //             for (const prescription of prescriptions) {
        //             eachRow =`
        //             <div class="card" style="width: 500px;">
                    
                
        //             <div class="col-sm-7">
        //                 <div class="card-body">
        //                     <h5 class="card-title text-left">`+prescription.Name+' <a href="#" class="btn btn-primary" style="margin-left:120%">Cancel Prescription</a>'+`</h5>
        //                     <p class="card-text text-left">`+prescription.PrevDate+"<br>"+ prescription.EndDate+"<br>"+  prescription.Interval_Days +`</p>
                        
        //                 </div>
                
        //             </div>
        //         </div>`
                    
                    
        //             rows += eachRow;
        //             }
        //                 // add all the rows to the table
        //             document.getElementById('prescription').innerHTML=rows
        //             } else if (response.status == 404) {
        //                 // No books
        //                 showError(result.message);
        //             } else {
        //                 // unexpected outcome, throw the error
        //                 throw response.status;
        //             }
        //         } catch (error) {
        //             // Errors when calling the service; such as network error, 
        //             // service offline, etc
        //             showError
        //             ('There is a problem retrieving books data, please try again later.<br />' + error);
        //             } // error
                
                    try {
                    
                        
                    console.log(ans);
                    console.log("hihi");
                    console.log(medication);
                    const response =
                    await fetch(
                    serviceURL3, { method: 'POST',
                    headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({Patient_Id : patientid, Appointment_Id : ans, PrevDate : creationdate, EndDate : enddate, Interval_Days : interval, Name : medication, Price : cost ,Gid:gid})
        }
                    );
                  
                    const result = await response.json();
                    if (response.status === 200) {
                        // success 
                        alert('Prescription Created');
                        location.reload();
                        console.log("WellDone"); // THIS DOESNT PRINT FXXXXXXK
                       
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
                    showError
                    ('There is a problem retrieving books data, please try again later.<br />' + error);
                    } // error
                
                
                });
            }


                
            
    </script>
    <?php 

        if(isset($_SESSION["success"])){
            if(!($_SESSION["success"])){
                echo "<script type='text/javascript'>alert('Please upload a smaller file or ensure that it is JPG!');</script>";
            }
        }
    
    ?>
</body>

</html>