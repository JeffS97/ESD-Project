var value = document.getElementById("search").value;
getPost(value);

function getPost(val) {

    console.log(val);
    
    var url = "";
    if (val !== "") {
        url = "../Main/searchbar.php?searchterm=" + val;
    } else {
        url = "../Main/getPost.php";
    }
    console.log(url);
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var posts = JSON.parse(this.response);
            var img = "";
            var number = 0;
            var unique = [];
            if(posts.gig.length!==0){
            for (var node of posts.gig) {


                if (node.gigCategory == "home") {
                    img = "../resources/images/plumb.jpg";
                } else if (node.gigCategory == "food") {
                    img = "../resources/images/food.jpg";
                } else if (node.gigCategory == "vehiclehelp") {
                    img = "../resources/images/carwash.jpg";
                } else if (node.gigCategory == "misc") {
                    img = "../resources/images/help.jpg";
                }
                var num = node.gigbooker.search('@');
                if (num != -1) {
                    name = node.gigbooker.slice(0, num);
                } else {
                    name = node.gigbooker;
                }
                var description = "";

                if (node.gigDescription.length > 30) {
                    description = node.gigDescription.slice(0, 20) + "...";
                } else {
                    description = node.gigDescription;
                }
                document.getElementById('bookings').innerHTML += `<div class="col-12   col-md-6 col-lg-4 ">
            <div class=" services  card expand ">
              <img class="card-img-top img-fluid" src="../resources/gigImages/${node.gigId}.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">${node.gigName} -Booked by  ${name}</h5>
                <h6>${node.bookeraddress}</h6>
                <p class="card-text">${description} <br>
                Date of Task-${node.gigStartDate}</p>
                <button class="button" onclick="window.location.href='../Main/process_task.php?id='+${node.gigId}">View</button>
              </div>
            </div>
            </div>
            `;
                number++;
            }
        }
        else{
            document.getElementById('bookings').innerHTML =`
            <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  No Tasks related to ${val} ,Try searching other services
</div>
            `
        }

            document.getElementById("number").innerText = number + " Tasks Available";
        }



    }
    request.open('GET', url, true);
    request.send();

}

var url = "../Main/getBookings.php";
var request = new XMLHttpRequest();
request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var result = JSON.parse(this.response);
        var img = "";
        var number = 0;
        if (!result.gig.length == 0) {
            for (var node of result.gig) {

                number++;
                if (node.gigCategory == "home") {
                    img = "../resources/images/plumb.jpg";
                } else if (node.gigCategory == "food") {
                    img = "../resources/images/food.jpg";
                } else if (node.gigCategory == "vehiclehelp") {
                    img = "../resources/images/carwash.jpg";
                } else if (node.gigCategory == "misc") {
                    img = "../resources/images/help.jpg";
                }
                document.getElementById("current").innerHTML += ` <li class="clearfix">
            <img class="bookimg" src="../resources/gigImages/${node.gigId}.jpg" alt="item" />
            <span class="item-name">${node.gigName}</span>
            <span class="item-price">$${node.gigPrice}</span>
          
            <span class="item-quantity d-block">Date: ${node.gigStartDate}</span>
            <a href="../Main/process_taskview.php?id=${node.gigId}" style="margin-left:45%;"> <span class="badge badge-success ">View Status</span></a>
            </li>
            <hr>`;

            }

        } else {
            document.getElementById("current").innerHTML += "<i>Empty..</i>";
        }
    }

}
request.open('GET', url, true);
request.send();


//Task
var url2 = "../Main/getTasks.php";
var request = new XMLHttpRequest();
request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var result = JSON.parse(this.response);
        var img = "";
        var number = 0;
        if (!result.gig.length == 0) {
            for (var node of result.gig) {

                number++;
                if (node.gigCategory == "home") {
                    img = "../resources/images/plumb.jpg";
                } else if (node.gigCategory == "food") {
                    img = "../resources/images/food.jpg";
                } else if (node.gigCategory == "vehiclehelp") {
                    img = "../resources/images/carwash.jpg";
                } else if (node.gigCategory == "misc") {
                    img = "../resources/images/help.jpg";
                }
                document.getElementById("tasks").innerHTML += ` <li class="clearfix">
            <img class="bookimg" src="../resources/gigImages/${node.gigId}.jpg" alt="item" />
            <span class="item-name">${node.gigName}</span>
            <span class="item-price">$${node.gigPrice}</span>
       
            <span class="item-quantity d-block">Date: ${node.gigStartDate}</span>
            <a href="../Main/process_taskview.php?id=${node.gigId}&check=1" style="margin-left:45%;"> <span class="badge badge-success ">View Status</span></a>
            <a href="../Main/process_update.php?id=${node.gigId}" style="margin-left:45%;"> <span class="badge badge-success d-inline">Mark as Complete</span></a>
          
            </li>
            <hr>`;

            }

        } else {
            document.getElementById("tasks").innerHTML += "<i>Empty..</i>";
        }
    }

}
request.open('GET', url2, true);
request.send();


//Task 3
// var request=new XMLHttpRequest();
// request.onreadystatechange=function(){
//     if(this.readyState==4 && this.status==200){
//         var data=JSON.parse(this.response);
        
//         if((data.weather[0].main=="Clouds") || (data.weather[0].main=="Rain" ) || (data.weather[0].main=="Drizzle")){
//             document.getElementById("weather").innerHTML="  Delivery Services may take  longer due to Rainy Condition"
//         }
//         else if(data.main.temp-273.15>=30){
//             document.getElementById("weather").innerHTML="  Good Sunny Time for a Car Wash";
//         }
//         else{
//             document.getElementById("weather").className="d-none";
//         }
//     }  
// }
// request.open("GET", "https://community-open-weather-map.p.rapidapi.com/weather?q=Singapore",true);
// request.setRequestHeader("x-rapidapi-key", "b64cb24da7mshb54fff16a229eb6p18d0f2jsn6534972993ac");


// request.send('en');
