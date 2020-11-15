<!DOCTYPE html>
<?php  

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

session_start();?>
<head>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <!--CSS Template-->
   
    <!--Cambria-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <!--Raleway font stylesheet-->
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

    <!--Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Vue JS -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <!--Axios-->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!--Montserrat-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="../WAD-2-Project/resources/templates/css template.css" />

    <!--Open Sans Regular-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!--Inter-->
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Open+Sans&display=swap" rel="stylesheet">

    <style>

        .logo{
          font-family: 'Open Sans', sans-serif;
          font-weight: bolder;
        } 
        
        .carousel-inner img {
            margin: auto;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            font-size: 23px;
        }
        
        h1 {
            font-size: 75px;
            font-weight: bold;
        }
        
        h2 {
            font-size: 50px;
        }
        
        p {
            font-size: 20px;
            text-align: center;
        }
        
        .container {
            padding: 20px;
            margin: auto;
            text-align: center;
        }
        
        
        .btn-primary {
            outline-style: solid blue;
            background-color: white;
            color: blue;
        }
        
        p.lead {
            font-size: 40px;
            font-weight: bold;
        }
        
        h5 {
            font-weight: bold;
            font-size: 25px;
        }
        .carousel-control {
        padding-top:10%;
        width:5%;
        }

        @media (max-width: 768px) {
        .carousel-inner .carousel-item > div {
            display: none;
        }
        .carousel-inner .carousel-item > div:first-child {
            display: block;
        }
        }

        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
        }

        /* display 3 */
        @media (min-width: 768px) {
            
            .carousel-inner .carousel-item-right.active,
            .carousel-inner .carousel-item-next {
            transform: translateX(33.333%);
            }
            
            .carousel-inner .carousel-item-left.active, 
            .carousel-inner .carousel-item-prev {
            transform: translateX(-33.333%);
            }
        }

        .carousel-inner .carousel-item-right,
        .carousel-inner .carousel-item-left{ 
        transform: translateX(0);
        }

        .card{
            font-size: 14px;
        }

        .btn-info-nav {
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

        .btn-info {
          font-size: 20px;
          color: white;
          letter-spacing: 1px;
          line-height: 22px;
          border: 2px solid ;
          border-radius: 30px;
          padding: 15px;
          
        }
        
        .container-fluid{
          width: 100%;
          height: 100%;
          
        }

        .dropdown-menu{
            /* Stay in place */
            
            z-index: 1000; /* Stay on top */
           
            /* Stay at the top */
        }
        .nav-item{
            padding-left: 20px;
            padding-right: 20px;
        }

        @media (min-width: 576px) {
            .card-columns {
                column-count: 1;
            }
        }

        @media (min-width: 768px) {
            .card-columns {
                column-count: 3;
            }
        }

        @media (min-width: 992px) {
            .card-columns {
                column-count: 3;
            }
        }

        @media (min-width: 1200px) {
            .card-columns {
                column-count: 3;
            }
        }
        

    </style>

</head>

<body>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <div class = "animate__animated animate__fadeInDown">

       
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:white; padding: 12px;">
            <div class = 'container' style="padding: 0;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <span class = 'logo' style="padding: 10px; font-size: 25px; padding-bottom: 5px;" ><img src = "https://www.flaticon.com/svg/static/icons/svg/1624/1624453.svg" height = 40px width = 40px> PROJECT HERO</span>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav" style="margin: auto;">
                    <li class="nav-item active">
                        <a class="nav-link" href="Homepage.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Task
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="./views/book2.php">Browse</a>
                        <a class="dropdown-item" href="./views/Booktask.php">Post</a>
                        </div>
                    </li>
                    <?php
            
              
              if(isset($_SESSION["email"])){
             ?>
                    <li class="nav-item dropdown">
                    <a class="nav-link" href="./views/leaderdisplay.php">Top Heroes </a>
                    </li>
                    
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profile
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="./views/History.php">History</a>
                        <a class="dropdown-item" href="./views/Profile v2.php">Settings</a>
                        
                        </div>
                    </li> 
                  <li>  <button type='button'  class='btn btn-info-nav btn-info'  ><a href='./Main/process_logout.php' style='color: white;text-decoration: none;'>Log Out</a></button></li>
                    <?php }else{?>
                        
                   
                    <!-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="background-color: transparent;">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </form> -->
                    
                <button type="button"  class="btn btn-info-nav btn-info" ><a href="./views/Signup.php" style="color: white;text-decoration: none;">Login</a></button>
                    <?php }?>  
                           <!-- <button type="button" class="btn btn-primary" style="margin: 10px;">Sign Up</button> -->
                    <span class = 'noti' style="padding: 10px; font-size: 25px; padding-bottom: 15px;" hidden><img src = "https://www.flaticon.com/svg/static/icons/svg/523/523152.svg" height = 35px width = 35px> </span>
                </div>
             </ul>  
            </div>
        
            </nav>
        <div class = 'container-fluid animate__animated animate__fadeIn animate__delay-1s' style="background-image: url(https://www.kut.org/sites/kut/files/styles/x_large/public/202005/el_paso_food_bank_coronavirus_pandemic_ek_tt_26.jpg); background-attachment: fixed;  background-size:cover; background-position: center; background-attachment: sticky; padding-top: 200px; padding-bottom: 200px; padding-left: 130px;">
            <div class="jumbotron">
            <h1 style="font-size:74px; font-family: 'Inter', sans-serif; margin-bottom: 0; color: white;">HIRE A HERO</h1>
            <h5 style="font-size: 25px; font-family: 'Montserrat', sans-serif; padding-top: 0; color: white;">Get instant help for everyday chores!</h5>
            <label class="sr-only" for="inlineFormInputGroup">Username</label>
            <form action="views/book2.php" method="POST" id="searchbar">
                <div class="input-group col-sm-4" style="margin: 0; padding: 0; margin-top: 20px; font-family: 'Open Sans', sans-serif;">
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search Gigs" name ='searchterm'>
                    <div class="input-group-prepend">
                    <button class="btn btn-primary bg-info btn-outline-info" type="submit" form="searchbar" value="Submit" style="color: white;">Search</button>
                    </div>
                </div>
            </form>
            </div>
            
        </div>
    
    </div>
    

    <section id="hire-a-hero" class = "animate__animated animate__fadeInLeft animate__delay-1s my-5">
        <div class="container">
        <ul class="nav justify-content-center nav-tabs" role="tablist">
            <li class="nav-item"><a aria-controls="hire-hero" aria-selected="false" class="nav-link text-info" data-toggle="tab" href="#hire-hero" id="tab-hire-hero" role="tab">Hire A Hero</a></li>
            <li class="nav-item"><a aria-controls="become-hero" aria-selected="false" class="nav-link text-info" data-toggle="tab" href="#become-hero" id="tab-become-hero" role="tab">Become A Hero</a></li>
            <li class="nav-item"><a aria-controls="contact-blu" aria-selected="true" class="nav-link active text-info" data-toggle="tab" href="#contact-blu" id="tab-contact-blu" role="tab">About us</a></li>
        </ul>
        
        <div class="tab-content">
        <div aria-labelledby="tab-hire-hero" class="tab-pane show" id="hire-hero" role="tabpanel">
        <div class="row justify-content-center">
        <div class="col my-auto animate__animated animate__fadeIn">
        <h3>Hire a Hero</h3>
        
        <p>Need a small task to be done?</p>
        <p>Worry not! Hire a Hero now and we will quickly assign a freelancer to you.</p>
        
        <a href="views/Booktask.php" class = "btn btn-info my-2">Find help now!</a></div>
        
        <div class="col-sm-12 col-md-7 col-lg-6 pl-lg-5 img-holder"><img src="./resources/images/help.jpg" class = "img-fluid"></div>
        </div>
        </div>
        <!-- end tab-pane-->
        
        <div aria-labelledby="tab-become-hero" class="tab-pane" id="become-hero" role="tabpanel">
        <div class="row justify-content-center">
        <div class="col my-auto animate__animated animate__fadeIn">

        
        <h3>Become a Hero</h3>
        
        <p>In need of work?</p>
        <p>Look no further. </p>
        <p>Become a Hero and you will have access to many fast jobs. Be rewarded for your hard work.</p>
        <a href="views/book2.php" class = "btn btn-info my-2">Get a job right now!</a></div>
        
        <div class="col-sm-12 col-md-7 col-lg-6 pl-lg-5 img-holder"><img src="./resources/images/plumber.jpg" class = "img-fluid"></div>
        </div>
        </div>
        <!-- end tab-pane-->
        
        <div aria-labelledby="tab-about-us" class="tab-pane active" id="contact-blu" role="tabpanel">
        <div class="row justify-content-center">
        <div class="col-sm-12 col-md-5 my-auto animate__animated animate__fadeIn">
        <h3>About us</h3>
        
        <p>Not every hero wears a cape.</p>
        <p>Welcome to Hire a Hero, a platform designed to help everyday individuals <b>find help for their daily tasks</b> and enable others to <b>find temporary jobs on the go.</b></p>
        <a href = "views/Signup.php" class = "btn btn-info my-2">Join us today!</a>
        </div>
        
        <div class="col-sm-6 col-md-7 col-lg-6 pl-lg-5 img-holder"><img src="./resources/images/hero.jpg" class = "img-fluid"></div>
        </div>
        </div>
        <!-- end tab-pane-->
        </div>
        </div>
        </section>


    <section id = "services" style = 'background-image: linear-gradient(#FFFFFF, #5bc0de, #FFFFFF);'>
        <div class = "pt-4 pb-1">
        <p class="lead mx-3">Services on Offer</p>
        <div class="container-fluid" id="moving" >
            <div class="container text-center mb-5 ">
              <div class="row mx-auto " >
                  <div id="listingsCarousel"  class="carousel slide mx-auto" data-ride="carousel">
                      <div class="carousel-inner w-100" role="listbox" >
                          <div class="carousel-item active">
                              <div class="col-md-4">
                                  <div class="shadow card card-body bg-light">
                                      <img class="img-fluid"  src="./resources/images/carwash.jpg">
                                    <p class="my-2">Car Wash</p>
                                  </div>
                              </div>
                          </div>
                          <div class="carousel-item">
                              <div class="col-md-4">
                                  <div class="shadow card card-body bg-light">
                                  <img class="img-fluid" src="./resources/images/delivery.jpg"></a>
                                  <p class="my-2">Delivery</p>
                                  </div>
                              </div>
                          </div>
                          <div class="carousel-item ">
                              <div class="col-md-4 " >
                                  <div class="shadow card card-body bg-light ">
                                      <img class="img-fluid "  src="./resources/images/clean.jpg">
                                      <p class="my-2">Home Services</p>
                                  </div>
                              </div>
                          </div>
                       
                      </div>
                      <a class="carousel-control-prev " href="#listingsCarousel" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next " href="#listingsCarousel" role="button" data-slide="next">
                          <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                      </a>
                  </div>
              </div>
          </div>
        </div>
    </section>

    <section id = "activeGigsNearYou" style = " background-size: 100%;">
    <p class="lead mx-3">Active Gigs in Singapore</p>
        <div class = "container " id = "app">
        <div class = "card-columns ">
            <gig-post
            v-for="gig in gigs"
            :key = "gig.gigName"
            :gigname="gig.gigName"
            :categoryname="gig.gigCategory"
            :gigdescription="gig.gigDescription"
            :gigbooker="gig.gigbooker"
            :location="gig.bookeraddress"
            :startdate = "gig.gigStartDate"
            :gigid = "gig.gigId">
            </gig-post>
        </div>
        <div class = "row justify-content-center" style="margin-top: 15px;"> <a href="views/Booktask.php" class = "btn btn-info">Book your own gig now!</a>
        </div>

    </section>


    <script>

            $(document).ready(function() {
                $('#myCarousel').carousel({
                interval: 10000
                })
                
                $('#myCarousel').on('slid.bs.carousel', function() {
                    //alert("slid");
                });
                
                
            });

            
        function showList(e) {
        var $gridCont = $('.grid-container');
        e.preventDefault();
        $gridCont.hasClass('list-view') ? $gridCont.removeClass('list-view') : $gridCont.addClass('list-view');
        }
        function gridList(e) {
        var $gridCont = $('.grid-container')
        e.preventDefault();
        $gridCont.removeClass('list-view');
        }

        $(document).on('click', '.btn-grid', gridList);
        $(document).on('click', '.btn-list', showList);
        $('#recipeCarousel').carousel({
        interval: 3000
        })

        $('.carousel .carousel-item').each(function(){
            var minPerSlide = 1;
            var next = $(this).next();
            if (!next.length) {
            next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
            
            for (var i=0;i<minPerSlide;i++) {
                next=next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                
                next.children(':first-child').clone().appendTo($(this));
            }
        });



    </script>

<script type="application/javascript">

Vue.component ('gig-post', {
    props: ['gigname', 'categoryname', 'gigdescription', 'gigbooker', 'location', 'gigid', 'startdate'],
    methods: {
        gigImagesPath: function(){
            var str1 = "resources/gigImages/";
            var str3 = ".jpg";
            var str2 = str1.concat(this.gigid);
            var strPath = str2.concat(str3);
            return strPath;
        },
    },
    template: 
    `
    <div class="card mb-3 " style="max-width: 540px;">
    <div class="row no-gutters">
        <div class="col-lg-4">
        <img :src='gigImagesPath()' class="card-img-top" style="height:15rem;object-fit:cover;" >
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title">{{gigname}}</h5>
            <p class="card-text">{{gigdescription}}</p>
            <p class="card-text"><small class="text-muted">Requested on: <br>{{startdate}}</small></p>
        </div>
        </div>
    </div>
    </div>
    
    `
    // <div class="col-md-4 col-lg-4 col-sm-4">
    //     <div class="card card-body" style="width: 22rem;">
    //         <img class="card-img-top" :src='gigImagesPath()'>
    //         <h5 class="card-title">{{ gigname }}</h5>
    //         <br>
    //         <h6 class="card-subtitle mb-2 text-muted"> Requested by: {{ gigbooker }}</h6>
    //         <h6 class="card-subtitle mb-2 text-muted"> Category Type: {{ categoryname }}</h6>
    //         <h6 class="card-subtitle mb-2 text-muted"> Location: {{ location }}</h6>
    //         <br>
    //         <p class="card-text">{{ gigdescription }}</p>
    //     </div>
    // </div>
    // // <div class="card col-md-4 col-lg-4 col-sm-4" style="width: 18rem;">
    // // <img class="card-img-top" :src='gigImagesPath()'>

    // <div class="card-body">
    // <h5 class="card-title">{{gigname}}</h5>
    // <h6 class="card-subtitle mb-2 text-muted"> Requested by: {{ gigbooker }}</h6>
    // <h6 class="card-subtitle mb-2 text-muted"> Category Type: {{ categoryname }}</h6>
    // <h6 class="card-subtitle mb-2 text-muted"> Location: {{ location }}</h6>
    // <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    // <p class="card-text">{{gigdescription}}</p></div>
    // </div>
    // </div>
    
});

const vm = new Vue ({
    el: "#app",
    data: {
        gigs: [],
    },
   
    methods: {
        getGigDetails: function(){
            axios.get('main/getSomePosts.php')
            .then(response => {
                this.gigs = response.data.gig;
            })
            .catch(error => console.log('Could not retrieve gig details...'));
        },
    },
    mounted: function(){
        this.getGigDetails();
        setInterval(this.getGigDetails(), 3000);
    }
});
</script>


</body>

</html>