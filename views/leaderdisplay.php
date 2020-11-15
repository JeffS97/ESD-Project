<!DOCTYPE html>
<head>
  <?php
session_start();
  ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!--Open Sans Regular-->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

        
    <!--Montserrat-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> 
    <style>

         .logo{
          font-family: 'Open Sans', sans-serif;
          font-weight: bolder;
        } 
        .nav-item{
            padding-left: 20px;
            padding-right: 20px;
            
        }
        .btn-info {
          font-size: 20px;
          color: white;
          letter-spacing: 1px;
          line-height: 15px;
          border: 2px solid ;
          border-radius: 30px;
          padding: 15px;
          margin-left:30%;
          position:sticky;
          width:150px;
          
        }
        *{ 
   padding:0;
  
}
body{
  font-size:23px;
  font-family:'Montserrat', sans-serif;
          
}
.group:after {
  content: "";
  display: table;
  clear: both;
}

.page_wrapper{
  width:100%;
  
  
}
.head_wrapper{
  background:#de625b;
  border-bottom:1px solid gold;
}

.head{
  background-color:gold;
  background-clip:content-box;
  border-bottom:2px solid #aaa;
}
.logo2{padding:2em;
  width:100%;
  font-family:'Open Sans', sans-serif;
  font-weight: 700;
  font-size:1em;
  text-align:center;
  color:#fff;
 

}
.banner{
  height:400px;

  
}
.wrapper{
  height:100%;
  margin-right:15%;
  background-position:center;
  
}
.banner_wrapper{
  margin:0 auto;
  padding:3em;
  width:448px;
  
}


.container{
 
  justify-content:center;
  
}
.title{
  margin:0;
  padding :20px 20px 20px 20px;
  line-height:18px;
  font-size:18px;
  padding-left:30px;
  width:500px;
    background-color:#444;
  color: #fff;
  border-radius: 5px 5px 0px 0px
}
h2 img{
  vertical-align:bottom;
  height:25px
}
ol{list-style: none;
margin-top:0;
  
  
}
.ld{
  width:500px;
  display:flex-column;
  padding-bottom:10px;
  border-radius:10px;
}
.rank{ 
  display: flex;
  background-color:#61d1d1;
  padding:10px 10px 10px 10px;
  color: #fff;
  align-items:baseline;
  justify-content:space-between;
  border:1px solid rgba(255,255,255,0.1)
}

small{
   font-size:16px;
  text-align:right;
  
}

.name{margin:0;
  padding-left:18px;
  line-height:10px;
  font-size:16px;
  text-transform:uppercase;
  
  
}
 .ld li h2::before, .ld li h2::after {
  content: '';
  position: absolute;
  z-index: 1;
  bottom: -11px;
  left: -9px;
  border-top: 10px solid #c24448;
  border-left: 10px solid transparent;
  -webkit-transition: all .1s ease-in-out;
  transition: all .1s ease-in-out;
  opacity: 0;
}
.ld li::before {
  content: counter(ld);
  position: absolute;
  z-index: 2;
  top: 15px;
  left: 15px;
  width: 20px;
  height: 20px;
  line-height: 20px;
  color: #61d1d1;
  background: #eee;
  border-radius: 20px;
  text-align: center;
}
.ld li {
  position: relative;
  z-index: 1;
  font-size: 14px;
  counter-increment: ld;
  padding: 18px 10px 18px 50px;
  cursor: pointer;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  -webkit-transform: translateZ(0) scale(1, 1);
          transform: translateZ(0) scale(1, 1);
}

    </style>
</head>
<body>


       
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:white; padding: 12px;">
        <div class = 'container' style="padding: 0;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span class = 'logo' style="padding: 10px; font-size: 25px; padding-bottom: 5px;" ><img src = "https://www.flaticon.com/svg/static/icons/svg/1624/1624453.svg" height = 40px width = 40px> PROJECT HERO</span>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav" style="margin: auto;">
                <li class="nav-item active">
                    <a class="nav-link" href="../Homepage.php">Home <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Task
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../views/book2.php">Browse</a>
                    <a class="dropdown-item" href="../views/Booktask.php">Post</a>
                    </div>
                </li>
               
                 <li class="nav-item dropdown">
                    <a class="nav-link" href="leaderdisplay.php">Top Heroes </a>
                    </li>
                    <?php
        
          
        if(isset($_SESSION["email"])){
       ?>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../views/History.php">History</a>
                    <a class="dropdown-item" href="../views/Profile v2.php">Settings</a>
                    
                    
                    </div>
                </li> 
              <li>  <button type='button'  class='btn btn-info'  ><a href='Signup.php' style='color: white;text-decoration: none;'>Log Out</a></button></li>
                <?php }else{?>
                    
            
                
         <li> <button type="button"  class="btn btn-info" ><a href="../views/Signup.php" style="color: white;text-decoration: none;">Join Us</a></button></li>  
                <?php }?>  
                       <!-- <button type="button" class="btn btn-primary" style="margin: 10px;">Sign Up</button> -->
                <span class = 'noti' style="padding: 10px; font-size: 25px; padding-bottom: 15px;" hidden><img src = "https://www.flaticon.com/svg/static/icons/svg/523/523152.svg" height = 35px width = 35px> </span>
            </div>
         </ul>  
        </div>
    
        </nav>
  
<div class="page_wrapper">
  <header class="head group">
    <div class="head_wrapper group">
      <div class="logo2"><h1>TOP  HEROES</h1></div>
    </div>  
  </header>
  <div class="container  ">
  <div class="row">
  <div class="col-sm-12 board ">
  <div class="banner mx-auto">
    <div class="wrapper">
      <div class="banner_content">
         <div class="banner_wrapper">
  
 
    <h2 class="title" style = 'text-align: center'><img src="http://findicons.com/files/icons/2799/flat_icons/256/trophy.png">
       TOP HEROES WITH MOST SERVICES COMPLETED</h2>
       
  
    <ol id="board" class="ld " >

    </ol>
  </div>
  </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</div>
</body>
<script>
    var leaders= [];
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var response=JSON.parse(this.response);
          console.log(response);
          var name="";
          for (x of response){
          
            var num = x[0].search('@');
             console.log(num)
                if (num != -1) {
                    name = (x[0].slice(0, num)).toUpperCase();
                } else {
                    name = x[0].toUpperCase();
                }
  document.getElementById('board').innerHTML+=
   '<li class="rank">'+
    '<h2 class="name">'
      +name+
    '</h2>'+
      '<small class="pts">'
        +x[1]+
     '</small></li>';
  
  
  
  
 

}
        }}
        request.open('GET', "../Main/leader.php", true);
    request.send();




</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <html>