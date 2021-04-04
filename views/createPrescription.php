<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script 
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    

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

    <!--Montserrat-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../resources/templates/css template.css">

    <!--Open Sans Regular-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!--Inter-->
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Open+Sans&display=swap" rel="stylesheet">

    <style>
             img{
	width: 100%;
}

/*Header Top Style*/

.notification{
	display: block;
	color: #fff;
  background: black;
}
.notification h2{
	display: inline-block;
}
.notification span{
	display: inline-block;
	font-size: 30px;
}
.notification p{
	display: inline-block;
	color: #19A463;
}

/*Header Middle Style*/
.fiverr-search .btn{
    position: absolute;
    top: 0;
    left: 270px;
}
input.btn.btn-success.btn-sm {
    padding: 5px 14px;
}

.header-middle.pt-4.pb-3 {
    border-bottom: 1px solid #7777;
}

.logo h2{}

.col-md-1.logo h2 {
    color: #555555;
    font-weight: 900;
    font-size: 30px;

}


.fiverr-search{
	position: relative;
	border: 1px solid #ddd;
	height: 34px;
}
.search-form  ::after{
	content: "\f002";
	font-family: FontAwesome; 
	color:#555555;
	position: absolute;
	top: 0;
	left: 5px;
} 
input[type="search"] {
    border: none;
}

input[type="search"] {
    border: none;
    margin-right: 50px;
    margin-left: 15px;
} 

.fiverr-menu ul {
    display: block;
}

.fiverr-menu li {
    display: inline-block;
    padding-left: 20px;
}

.fiverr-menu a {
	color: #777;
	font-size: 16px;
	font-weight: 600;
}
.fiverr-menu a:hover{
	color: #40CA89;
}

.fiverr-menu span {
    color: #40CA89;
}
.pro {
    color: #1fd0b6 !important;
}
.col-md-7.fiverr-menu {
    text-align: right;
}

.profile-pic img {
    border-radius: 50%;
    height: 40px;
    width: 40px;
} 

.profile-pic::after {
    content: "";
    top: 0;
    left: 46px;
    height: 8px;
    width: 8px;
    position: absolute;
    border-radius: 50%;
    background-color: #40CA89;
}

.message::after {
	content: "";
    top: 0;
    height: 5px;
    width: 5px;
    position: absolute;
    border-radius: 50%;
    background-color: #F21AA5;
}

/*Header Bottom Style*/

.bottom-menu ul {
    display: block;
}

.bottom-menu li {
    display: inline-block;
}

.bottom-menu a {
    color: #62646a;
    padding: 0px 14px;
    font-size: 16px;
    font-weight: 600;
}
.bottom-menu{
	border-bottom: 1px solid #7777;}

        body{
            font-family:'Montserrat', sans-serif;
            font-size: 23px;
        }
        .nav-item{
            padding-left: 20px;
            padding-right: 20px;
        }
        @media screen and (max-width: 575px) {
            .carousel{
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }
        .btn-info {
          font-size: 20px;
          color: white;
          letter-spacing: 1px;
          line-height: 15px;
          border: 2px solid ;
          border-radius: 30px;
          padding: 15px;
          margin-left:85%;
          position:sticky;
          width:150px;
          
        }
        .container-fluid{
          width: 100%;
          height: 100%;
          color: #909090;
          
        }
        
        .form-valid {
            opacity: 0.5;
        }
        
        .form-control-label abbr {
            text-decoration: none;
            font-weight: normal;
        }
        
        #basic-addon1,
        #submit-btn {
            background-color: #5dbcd2;
            color: white;
        }

        .form-group{
            text-align:left;
        }
    </style>

    <title>Create Prescription</title>
  </head>
  <body>
  
       
  <div class="header-middle pt-4 pb-3">
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-md-1 logo" >
				<a href="#" ><h2>CliniQ</h2></a>
                
 			</div>
 			<div class="col-md-3 fiverr-search" style="margin-left:5px">
				<div class="search-form">
				<div class="form ">
 					<input type="search" placeholder="Find Services">
 					<input class="btn btn-success btn-sm" type="submit" value="Search">
 				</div>
				</div>

 			</div>
 			<div class="col-md-7 fiverr-menu">
 				<ul>
 					<li><a class="pro" href="">Home</a></li>
 					<li><a href="">Profile</a></li>
 					<li><a class="message" href="">History</a></li>
 				
 					<li><a href=""><span>Logout</span></a></li>
 				</ul>
 			</div>
 			<!-- <div class="col-md-1 profile-pic">
 				
 			</div> -->
 		</div>
 	</div>
 </div>

 <!-- Header Bottom Start Here -->

 <div class="header-bottom pt-3">
 	<div class="container-fluid">
 		<div class="row bottom-menu justify-content-center">
 			<ul class="">
 				<li><a href="">View My Appointments</a></li>
 				<li><a href="">View My Past Bookings</a></li>
 				<li><a href="">Quick Booking</a></li>
                 <!-- <?php
                 if($_SESSION['role']=='doctor' || $_SESSION['role']=='nurse'){

                echo '<li><a href="">Video & Animation</a></li>';
                echo '<li><a href="">Manage Appointments</a></li>';
                echo '<li><a href="">Manage Patients</a></li>';
                echo  '<li><a href="">Approve Refill</a></li>';
                 }
                 ?> -->
 				
 				
 			</ul>
 		</div>
 	</div>
 </div>
                </div>


    <div class="container my-5">

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
        </div>
      
           
           
      
        <div class="w-75 mx-auto">
       
            <h3 style="margin-left:60%"><b>Create a Prescription</b></h3>
            <hr>
        </div>
        <h3 style="margin-right:60%"><b>Appointment ID: <?php echo $_GET['id'];?></b></h3>
        <div class="float-left ml-5 mt-4">
        <div class="card text-white bg-secondary  mb-3" style="max-width: 25rem;">
  <div class="card-header">Appointment Details</div>
  <div class="card-body">
    
    <p class="card-text text-left" id='appointment' >
       
               
    </p>
  </div>
  
</div>
<div id='prescription'>
    
    

                </div>

        </div>
                </div>

        <div class="w-50 float-right card img-fluid" >
            <!-- <img class="card-img-top" src="plumb.jpg" alt="Card image" style="height:100%;">
            <div class="card-img-overlay"> -->
            <form class="card-body" style="margin-left:10%" novalidate="" method="POST"   id="bootstrapForm" enctype="multipart/form-data">

            <div class="form-group">
                    <label class="h4 form-control-label" for="input2">Name of Medication<abbr class="text-danger" title="This is required">*</abbr></label>
                    <textarea class="form-control" name="i2" id="input2" rows="2" placeholder="" required></textarea>
                    <div class="invalid-feedback">Please enter a task description. This field is required</div>
                </div>
                <div class="form-group">
                    <label class="h4 form-control-label" for="input22">Patient Id<abbr class="text-danger" title="This is required">*</abbr></label>
                    <input type="text" class="form-control" name="i7" id="input22"  placeholder=" " required></textarea>
                    <div class="invalid-feedback">Please enter a task title. This field is required</div>
                </div>
                <div class="form-group">
                    <label class="h4 form-control-label" for="input7">Prescription Creation Date<abbr class="text-danger" title="This is required">*</abbr></label>
                    <input type="date" class="form-control" name="i7" id="input7"  placeholder="House Cleaning" required></textarea>
                    <div class="invalid-feedback">Please enter a task title. This field is required</div>
                </div>
                <div class="form-group">
                    <label class="h4 form-control-label" for="input777">Prescription End Date<abbr class="text-danger" title="This is required">*</abbr></label>
                    <input type="date" class="form-control" name="i777" id="input777"  placeholder="" required></textarea>
                    <div class="invalid-feedback">Please enter a task title. This field is required</div>
                </div>
                <div class="form-group">
                    <label class="h4 form-control-label" for="input77">Prescription Interval<abbr class="text-danger" title="This is required">*</abbr></label>
                    <br>  <select id="input77">
<?php
    for ($i=1; $i<=100; $i++)
    {
        ?>
        
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
?>
</select>
                </div>

              
                

                <div class="form-group">
                    <label class="h4 form-control-label" for="input3">Cost of Medicine<abbr class="text-danger" title="This is required">*</abbr></label>
                    <div class="input-group mb-3">
                        
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">$</span>
                        </div>
                        <input type="text" placeholder="10.00" class="form-control" name="i3" id="input3" required>
                        <div class="invalid-feedback">Please enter a valid price like 6.50. This field is required.</div>
                    </div>

                </div>

                

                <div>
                    <button type="button" class="btn" style="border-radius:30px;" onclick="getx()" id="submit-btn">Create</button>
                </div>
            </form>

        </div>
        <!-- /.card -->

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
                var serviceURL = "http://127.0.0.1:5100/view_by_appointment";
                var serviceURL1 = "http://127.0.0.1:5105/display_possible_refills";

                
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
                                    "Appointment Time: " + appts.ApptTime + "<br>" +
                                    "Completed: " + comp + "<br>" +
                                    "Patient ID: " + appts.Patient_Id+ "<br>" +
                                    "Symptom: " + appts.Symptom + "<br>"
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
                    var serviceURL4 = "http://127.0.0.1:5105/delete_prescription";
                    
                
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
                var gid=1;

                $(async() => {           
                    // Change serviceURL to your own
                    //var serviceURL = "http://127.0.0.1:5100/view_by_appointment";
                    //var serviceURL1 = "http://127.0.0.1:5105/display_possible_refills";
                    var serviceURL3 = "http://127.0.0.1:5105/add_Prescription";
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