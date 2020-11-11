
var value=document.getElementById("search").value;
getPost(value);
function getPost($val){
   
    var url="";
    if($val!==""){
         url="../Main/searchbar.php?searchterm="+$val;
    }else{
     url="../Main/getPost.php";
    }
    console.log(url);
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var posts=JSON.parse(this.response);
            var img="";
            var number=0;
            var unique=[];
           for(var node of posts.gig){
              
              
            if(node.gigCategory=="home"){
                img="../resources/images/plumb.jpg";
            }
            else if(node.gigCategory=="food"){
                img="../resources/images/food.jpg";
            }
            else if(node.gigCategory=="vehiclehelp"){
             img="../resources/images/carwash.jpg";
         }else if(node.gigCategory=="misc"){
             img="../resources/images/help.jpg";
         }
            var num=node.gigbooker.search('@');
            if(num!=-1){
            name=node.gigbooker.slice(0,num);
            }
            else{
                name=node.gigbooker;
            }
            var description="";
          
            if(node.gigDescription.length>30){
                 description=node.gigDescription.slice(0,29)+"...";
            }
            else{
                description=node.gigDescription;
            }
            document.getElementById('bookings').innerHTML+=`<div class="col-12   col-md-6 col-lg-4 ">
            <div class=" services  card expand ">
              <img class="card-img-top img-fluid" src="${img}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">${node.gigName} -Booked by  ${name}</h5>
                <h6>${node.bookeraddress}</h6>
                <p class="card-text">${description} lol<br>
                Date of Task-${node.gigStartDate}</p>
                <button class="button" onclick="window.location.href='../Main/process_task.php?id='+${node.gigId}">View</button>
              </div>
            </div>
            </div>
            `;
            number++;
           }
        
           document.getElementById("number").innerText=number+" Tasks Available";
        }
        
      
       
    }
    request.open('GET', url, true);
    request.send();
   
}

var url="../Main/getBookings.php";
var request = new XMLHttpRequest();
request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var result=JSON.parse(this.response);
        var img="";
        var number=0;
        if(!result.gig.length==0){
        for(var node of result.gig){
       
        number++;
           if(node.gigCategory=="home"){
               img="../resources/images/plumb.jpg";
           }
           else if(node.gigCategory=="food"){
               img="../resources/images/food.jpg";
           }
           else if(node.gigCategory=="vehiclehelp"){
            img="../resources/images/carwash.jpg";
        }else if(node.gigCategory=="misc"){
            img="../resources/images/help.jpg";
        }
            document.getElementById("current").innerHTML+= ` <li class="clearfix">
            <img class="bookimg" src="${img}" alt="item" />
            <span class="item-name">${node.gigName}</span>
            <span class="item-price">$${node.gigPrice}</span>
          
            <span class="item-quantity d-block">Date: ${node.gigStartDate}</span>
            <a href="../Main/process_register.php?id=${node.gigId}" style="margin-left:45%;"> <span class="badge badge-success ">View Status</span></a>
            </li>
            <hr>`;
           
        }
       
    }
    else{
        document.getElementById("current").innerHTML+="<i>Empty..</i>";
        }
    }
   
}
request.open('GET', url, true);
request.send();


//Task
var url2="../Main/getTasks.php";
var request = new XMLHttpRequest();
request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var result=JSON.parse(this.response);
        var img="";
        var number=0;
        if(!result.gig.length==0){
        for(var node of result.gig){
       
        number++;
        if(node.gigCategory=="home"){
            img="../resources/images/plumb.jpg";
        }
        else if(node.gigCategory=="food"){
            img="../resources/images/food.jpg";
        }
        else if(node.gigCategory=="vehiclehelp"){
         img="../resources/images/carwash.jpg";
     }else if(node.gigCategory=="misc"){
         img="../resources/images/help.jpg";
     }
            document.getElementById("tasks").innerHTML+= ` <li class="clearfix">
            <img class="bookimg" src="${img}" alt="item" />
            <span class="item-name">${node.gigName}</span>
            <span class="item-price">$${node.gigPrice}</span>
       
            <span class="item-quantity d-block">Date: ${node.gigStartDate}</span>
            <a href="#" style="margin-left:45%;"> <span class="badge badge-success ">View Status</span></a>
            </li>
            <hr>`;
           
        }
       
    }
    else{
        document.getElementById("tasks").innerHTML+="<i>Empty..</i>";
        }
    }
   
}
request.open('GET', url2, true);
request.send();

