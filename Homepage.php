
<!DOCTYPE html>

<head>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <!--CSS Template-->
    <link rel= "stylesheet" href="css template.html">

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

    <style>
        
        
        .carousel-inner img {
            margin: auto;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
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
          color: #595757;
          
        }

        .nav{
            position: sticky; /* Stay in place */
            
            z-index: 1; /* Stay on top */
            top: 0; /* Stay at the top */
        }
        .nav-item{
            padding-left: 20px;
            padding-right: 20px;
        }

    </style>

</head>

<body>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:white; padding: 12px;">
        <div class = 'container' style="padding: 0;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <span class = 'logo' style="padding: 10px; font-size: 25px; padding-bottom: 5px;" ><img src = "https://www.flaticon.com/svg/static/icons/svg/1624/1624453.svg" height = 40px width = 40px> PROJECT HERO</span>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav" style="margin: auto;">
                  <li class="nav-item active">
                    <a class="nav-link" href="../../Homepage.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Task
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="../../views/book2.php">Browse</a>
                      <a class="dropdown-item" href="../../views/Booktask.php">Post</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Listings
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="userRequest.php">My Requests</a>
                      <a class="dropdown-item" href="userTasks.php">My Tasks</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown collapse">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Profile
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="../../views/History.php">History</a>
                      <a class="dropdown-item" href="../../views/Profile v2.php">Settings</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="logout.php" hidden>Log Out</a>
                    </div>
                  </li> 
                </ul>
                <!-- <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="background-color: transparent;">
                  <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form> -->
                <?php
            
              
              if(isset($_SESSION["email"])){
             ?>
           <button type='button'  class='btn btn-primary' style='margin:10px;'><a href='../../views/Signup.html' style='color: white;text-decoration: none;'>Log Out</a></button>
              <?php }else{?>

                <button type="button"  class="btn btn-info" style="margin: 10px;"><a href="../../views/Signup.html" style="color: white;text-decoration: none;">Join Us</a></button>
              <?php }?>
                <!-- <button type="button" class="btn btn-primary" style="margin: 10px;">Sign Up</button> -->
                <span class = 'noti' style="padding: 10px; font-size: 25px; padding-bottom: 15px;" hidden><img src = "https://www.flaticon.com/svg/static/icons/svg/523/523152.svg" height = 35px width = 35px> </span>
              </div>
          </nav>
        </div>
    
    
    <div class = 'container-fluid' style="background-image: url(https://www.mcjanitorialsystems.com/wp-content/uploads/2015/02/Asian-cleaner-clean-the-floor.jpg);  background-size:cover; background-position: center; background-attachment: sticky; padding-top: 200px; padding-bottom: 200px; padding-left: 130px;">
        <div class="jumbotron">
          <h1 style="font-size:74px; font-family: 'Inter', sans-serif; margin-bottom: 0;">HIRE A HERO</h1>
          <h5 style="font-size: 25px; font-family: 'Montserrat', sans-serif; padding-top: 0;">Get instant help for everyday chores!</h5>
          <label class="sr-only" for="inlineFormInputGroup">Username</label>
          <form action="../../Main/searchbar.php" method="POST" id="searchbar">
            <div class="input-group col-sm-4" style="margin: 0; padding: 0; margin-top: 20px; font-family: 'Open Sans', sans-serif;">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search Gigs" name ='searchterm'>
                <div class="input-group-prepend">
                  <button class="btn btn-primary bg-info" type="submit" form="searchbar" value="Submit" style="color: white;">Search</button>
                </div>
            </div>
    </section>

    <section id="hire-a-hero" class = "animate__animated animate__fadeInLeft my-5">
        <div class="container">
        <ul class="nav justify-content-center nav-tabs" role="tablist">
            <li class="nav-item"><a aria-controls="hire-hero" aria-selected="false" class="nav-link" data-toggle="tab" href="#hire-hero" id="tab-hire-hero" role="tab">Hire A Hero</a></li>
            <li class="nav-item"><a aria-controls="become-hero" aria-selected="false" class="nav-link" data-toggle="tab" href="#become-hero" id="tab-become-hero" role="tab">Become A Hero</a></li>
            <li class="nav-item"><a aria-controls="contact-blu" aria-selected="true" class="nav-link active" data-toggle="tab" href="#contact-blu" id="tab-contact-blu" role="tab">About us</a></li>
        </ul>
        
        <div class="tab-content">
        <div aria-labelledby="tab-hire-hero" class="tab-pane show" id="hire-hero" role="tabpanel">
        <div class="row justify-content-center">
        <div class="col my-auto animate__animated animate__fadeIn">
        <h3>Hire a Hero</h3>
        
        <p>Need a small task to be done?</p>
        <p>Worry not! Hire a Hero now and we will quickly assign a freelancer to you.</p>
        <a class="btn btn-site outline has-arrow" href="">Learn more</a></div>
        
        <div class="col-sm-6 col-md-7 col-lg-6 pl-lg-5 img-holder"><img src="./resources/images/help.jpg" class = "img-fluid"></div>
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
        <a class="btn btn-site outline has-arrow" href="">Learn more</a></div>
        
        <div class="col-sm-6 col-md-7 col-lg-6 pl-lg-5 img-holder"><img src="./resources/images/plumber.jpg" class = "img-fluid"></div>
        </div>
        </div>
        <!-- end tab-pane-->
        
        <div aria-labelledby="tab-about-us" class="tab-pane active" id="contact-blu" role="tabpanel">
        <div class="row justify-content-center">
        <div class="col my-auto animate__animated animate__fadeIn">
        <h3>About us</h3>
        
        <p>Not every hero wears a cape.</p>
        <p>Welcome to Hire a Hero, a platform designed to help everyday individuals <b>find help for their daily tasks</b> and enable everyday individuals to <b>find temporary jobs on the go.</b></p>
        </div>
        
        <div class="col-sm-6 col-md-7 col-lg-6 pl-lg-5 img-holder"><img src="./resources/images/hero.jpg" class = "img-fluid"></div>
        </div>
        </div>
        <!-- end tab-pane-->
        </div>
        </div>
        </section>

    <hr/>

    <section id = "services" class = "animate__animated animate__fadeIn animate__delay-1s">
        <p class="lead mx-3">Services on Offer</p>
        <div class="container-fluid" id="moving" >
            <div class="container text-center mb-5 ">
              <div class="row mx-auto " >
                  <div id="listingsCarousel"  class="carousel slide mx-auto" data-ride="carousel">
                      <div class="carousel-inner w-100" role="listbox" >
                          <div class="carousel-item active">
                              <div class="col-md-4">
                                  <div class="card card-body bg-light">
                                      <img class="img-fluid"  src="./resources/images/carwash.jpg">
                                    <p class="my-2">Car Wash</p>
                                  </div>
                              </div>
                          </div>
                          <div class="carousel-item">
                              <div class="col-md-4">
                                  <div class="card card-body bg-light">
                                  <a href="#">    <img class="img-fluid" src="./resources/images/delivery.jpg"></a>
                                  <p class="my-2">Delivery</p>
                                  </div>
                              </div>
                          </div>
                          <div class="carousel-item ">
                              <div class="col-md-4 " >
                                  <div class="card card-body bg-light ">
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
    </section>

<hr/>

    <div id = "app" class ="animate__animated animate__fadeIn animate__delay-2s">
        <span>{{test}}</span>
        <p class="lead mx-3">Freelancers Near You</p>
        <div class="container-fluid" id="moving" >
            <div class="container text-center mb-5 ">
            <div class="row mx-auto " >
                <div id="recipeCarousel"  class="carousel slide mx-auto" data-ride="carousel">
                    <div class="carousel-inner w-100" role="listbox" >
                        <!-- <div class="carousel-item active">
                            <div class="col-md-4">
                                <div class="card card-body bg-light">
                                    <img class="img-fluid"  src="https://static01.nyt.com/images/2020/03/03/well/physed-foods/physed-foods-mediumSquareAt3X.jpg">
                                    Home Services
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-4">
                                <div class="card card-body bg-light">
                                <a href="#">    <img class="img-fluid" src="https://static01.nyt.com/images/2020/03/03/well/physed-foods/physed-foods-mediumSquareAt3X.jpg"></a>
                                Delivery
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="col-md-4 " >
                                <div class="card card-body bg-light ">
                                    <img class="img-fluid "  src="https://static01.nyt.com/images/2020/03/03/well/physed-foods/physed-foods-mediumSquareAt3X.jpg">
                                    Home Services
                                </div>
                            </div>
                        </div> -->
                    
                    </div>
                    <a class="carousel-control-prev " href="#recipeCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next " href="#recipeCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

   

    <section id = "testimonials">

        <div class = "container"></div>

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

    <script>
        const vm = new Vue ({
            el: "#app",
            data: {
                test: "hello",
                gigsNearYou: null
            },
            methods: {
                getGigDetails: function(){
                    axios.get('Main/getPost.php')
                    .then(response => {
                        this.gigsNearYou = response.data;
                    })
                    .catch(error => console.log('Could not retrieve gig details...'));
                }
            }
        })
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>