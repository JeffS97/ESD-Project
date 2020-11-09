window.onload=getPost();

function getPost(){

    let url="../Main/getPost.php";
   
    var request = new XMLHttpRequest();
    var number=0;
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var posts=JSON.parse(this.response);
            var img="";
          
         
           for(var node of posts.gig){
          
            
            if(node.gigCategory=="cleaning"){
                img="../resources/images/plumb.jpg";
            }
            document.getElementById('bookings').innerHTML+=`<div class="col-12  col-md-6 col-lg-4 ">
            <div class=" services card expand">
              <img class="card-img-top" src="${img}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">${node.gigName} -Booked by  ${node.gigbooker}</h5>
                <h6>${node.bookeraddress}</h6>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.<br>
                Date of Task-${node.gigStartDate}</p>
                 <button class="button" onclick="window.location.href='./Singletask.php?id='+${node.gigId}" >View</button>
              </div>
            </div>
            </div>
            `;
         
            number++;
           
           }
          
           document.getElementById("number").innerHTML=number+" Tasks Available";
           console.log(number)
           
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
       
        for(var node of result.gig){
      
           if(node.gigCategory=="cleaning"){
               img="../resources/images/plumb.jpg";
           }
            document.getElementById("current").innerHTML+= ` <li class="clearfix">
            <img class="bookimg" src="${img}" alt="item" />
            <span class="item-name">${node.gigName}</span>
            <span class="item-price">$${node.gigPrice}</span>
       
            <span class="item-quantity d-block">Date: ${node.gigStartDate}</span>
            </li>
            <hr>`;
           
        }
    }
   
}
request.open('GET', url, true);
request.send();


