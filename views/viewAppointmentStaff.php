<!DOCTYPE html>
<html>
<head>
<title>...</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" 
    crossorigin="anonymous">
    <script 
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    

    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<style>
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
  #myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
  border-collapse: collapse; /* Collapse borders */
  width: 100%; /* Full-width */
  border: 1px solid #ddd; /* Add a grey border */
  font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
  text-align: left; /* Left-align text */
  padding: 12px; /* Add padding */
}

#myTable tr {
  /* Add a bottom border to all table rows */
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  /* Add a grey background color to the table header and on hover */
  background-color: #f1f1f1;
}
</style>
</head>
<body>
<script>

  
  

</script>
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
                 <br><br>
                 <div class="container w-50" style="margin-right:50%">
                 <table>
                     <tr>
                         <h1>Select Appointment Date:</h1>
                         <input type='hidden' value=<?php echo 1;?> id='lol'/>
                         <td><input type="date" id='calender' class="form-control ml-5 mt-4" onchange="getme()" width="300px"> </td>
                     </tr>
                 </table>
                </div>
                <div class="container w-50" style="margin-left:35%">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
                <table id="myTable">
  <tr class="header">
  
    <th>Appointment ID</th>
            <th>Patient ID</th>
            <th>Appointment Date</th>
            <th>Appointment Time</th>
            <th>Sympton</th>
     
            <th>Completed?</th>
            <th>View</th>
  </tr>
  <tbody id='app'>
       
       
       </tbody>
 
</table>
   
</div>
</body>

<script>

function getme(){
    document.getElementById('app').innerHTML="";
    var gid =document.getElementById('lol').value;
    var apptDate=document.getElementById('calender').value;
    
    $(async() => {           
        // Change serviceURL to your own
        var serviceURL = "http://127.0.0.1:5100/worker_views_all_appointments";
        
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
                    "<td>"+"<a href='./createPrescription.php?id="+book.Appointment_Id+"' class=' btn btn-primary'>View</a>"+"</td>"


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
</html>