<!doctype html>
<?php
require_once "../model/common.php";

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--Cambria-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <!--Raleway font stylesheet-->
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

    <!-- Vue JS -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

    <!--Axios-->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <style>
        .logo{
            font-family: cambria;}
        .nav{
            position: fixed; /* Stay in place */
            z-index: 1; /* Stay on top */
            top: 0; /* Stay at the top */
        }
        .btn-info {
          font-size: 20px;
          color: white;
          letter-spacing: 1px;
          line-height: 22px;
          border: 2px solid ;
          margin-left:1em;
          border-radius: 30px;
          padding: 15px;
          margin-left:80%;
          
        }
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

        /* CHAT INLINE STYLES HERE */

        #chat {
            height: 400px;
            overflow: auto;
        }

        #sendMsg{
            
        }
        

        .msgSenderBackground {
            display: inline-block;
            background-color: lightblue;
            font-size: 14px;
            margin: 10px 25px;
            padding: 10px;
            border-radius: 10px;
        }

        .time {
            font-size: 11px;
            color: grey;
            margin-left: 15px;
        }

        .msgReceiverBackground{
            
            display: inline-block;
            position: absolute;
            right: 0;
            /* text-align: right; */
            /* display: inline-block; */
            background-color: white;
            font-size: 14px;
            margin: 10px 25px;
            padding: 10px;
            border-radius: 10px;
        }

        


        
    </style>

    <title>Chat</title>
  </head>
  <body>

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
                        <a class="nav-link" href="../Homepage.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Task
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="./book2.php">Browse</a>
                        <a class="dropdown-item" href="./Booktask.php">Post</a>
                        </div>
                    </li>
                    <?php
            
              
              if(isset($_SESSION["email"])){
             ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Listings
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="userRequest.php">My Requests</a>
                        <a class="dropdown-item" href="userTasks.php">My Tasks</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profile
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="./History.php">History</a>
                        <a class="dropdown-item" href="./Profile v2.php">Settings</a>
                        <div class="dropdown-divider"></div>
                        
                        </div>
                    </li> 
                  <li>  <button type='button'  class='btn btn-info'  ><a href='../Main/process_logout.php' style='color: white;text-decoration: none;'>Log Out</a></button></li>
                    <?php }else{?>
                        
                   
                    <!-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="background-color: transparent;">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </form> -->
                    
                <button type="button"  class="btn btn-info" ><a href="./Signup.php" style="color: white;text-decoration: none;">Login</a></button>
                    <?php }?>  
                           <!-- <button type="button" class="btn btn-primary" style="margin: 10px;">Sign Up</button> -->
                    <span class = 'noti' style="padding: 10px; font-size: 25px; padding-bottom: 15px;" hidden><img src = "https://www.flaticon.com/svg/static/icons/svg/523/523152.svg" height = 35px width = 35px> </span>
                </div>
             </ul>  
            </div>
        
            </nav>

        <div class="container " id="chatgroup">
            <div class="row justify-content-center">
                <div class="col-sm-8 bg-light p-0">
                      <div id="chat">
                        <div v-for="msg in messages">
                            <p class="msgSenderBackground">
                              <span><b>{{msg.sender}}:</b></span>
                              <span>{{msg.message}}</span>
                              <span class="time">{{msg.msgDateTime}}</span>
                             </p>
                            </div>
                         
                        </div>
                        <div id="sendMsg" class="input-group">
                            <input v-on:keyup.enter="addChat" v-model="message" id="message" type="text" class="form-control" placeholder="Type a Message!" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                            <button class="btn btn-primary" type="button"  @click="addChat">Send</button>
                            </div>
                      </div> 
                        
                </div>
            </div>
        </div>
    
        <script>

            const vm = new Vue({
                el: '#chatgroup',
                data: {
                  sender: 'admin@gmail.com',
                  message: '',
                  recipient: 'rohan@gmail.com',
                  datetime: '2020-11-14 02:00:00',
                  gigId: '1',
                  messages: []
                },
                methods:  {
                  getChat: function(){
                    axios.get('../Main/getChat.php')
                        .then(response => {
                            // this gets the data, which is an array
                            //console.log(response.data.chat)
                            msgObjs = response.data.chat;
                            console.log (msgObjs);
                            for (msg of msgObjs) {
                                //console.log(msg.chatid)
                                // pass the data to Vue instance's posts property
                                this.messages.push(msg);
                            }
                        })
                        .catch(error => {
                            console.log(error);
                        });        
                  },
                  addChat: function(){
                   //alert("added");

                   
                   /*axios.post('../Main/addChat.php', JSON.stringify({
                        sender: this.sender,
                        message: this.message,
                        recipient: this.recipient,
                        datetime: this.datetime,
                        gigId:this.gigId
                    }))*/
                    url = '../Main/addChat.php?sender=' + 
                            encodeURIComponent(this.sender) + '&recipient=' + encodeURIComponent(this.recipient) + '&message=' + encodeURIComponent(this.message)
                            + '&datetime=' + encodeURIComponent(this.datetime) + '&gigId=' + encodeURIComponent(this.gigId)
                    axios.get(url)
                    .then(response => {
                        console.log(response.data)
                        //this.showStatus = true
                        //this.status = response.data
                    })
                    .catch(error => {
                      console.log(error.message)  
                      //this.showStatus = true
                        //this.status = 'There was an error: ' + error.message 
                    }) 
                  }
                },
                mounted: function() {
                  this.getChat();
                  window.setInterval(this.getChat(), 1000);
                }


            });
            
            // Get the input field
            /*const input = document.querySelector("input");

            // Execute a function when the user releases a key on the keyboard
            input.addEventListener("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
                sendMsg();
            }
            });

            windows.load() = retrieveMsgs();
            
            */
 

            /*function retrieveMsgs(){
                let msgvalue = "";
                for (message in messages){}

            }*/
            /*  
            function sendMsg(){
                const msgvalue = document.getElementById("message").value
                var currentTime= new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});

                const time = document.createElement("span");
                time.setAttribute("class","time");
                time.innerText = currentTime;

                
                const p = document.createElement("p");
                p.setAttribute("class","msgSenderBackground");
                p.innerText = msgvalue;

                const br = document.createElement("br");

                const chatbox = document.getElementById("chat");
                p.appendChild(time);
                chatbox.appendChild(p);
                chatbox.appendChild(br);

                const request = new XMLHttpRequest();
                request.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        //console.log(this.responseText);
                        //JSON.parse(this.responseText);
                      
                    }
                };
                //console.log(jsonObj);
                request.open("POST", "addChat.php", true);
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                //request.send("query=" + jsonObj);

                

                document.getElementById("message").value = '';
                
            }


            */


        </script>
        <?php
          //var_dump(json_decode(array_keys($_POST),true));
         // $_POST = json_decode(array_keys($_POST),true);
        ?>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  </body>
</html>

