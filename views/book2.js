window.onload=getPost();

function getPost(){
    let url="../Main/getPost.php";
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var posts=JSON.parse(this.response);
           for(var node of posts.gig){
        console.log(node);
            document.getElementById('bookings').innerHTML+=`<div class="col-12  col-md-6 col-lg-4 ">
            <div class=" services card expand">
              <img class="card-img-top" src="./plumb.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">${node.gigName} -Booked by  ${node.gigbooker}</h5>
                <h6>${node.bookeraddress}</h6>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.<br>
                Date of Task-${node.gigStartDate}</p>
                <button class="button">View</button>
              </div>
            </div>
            </div>
            `;
           }
        }
    }
    request.open('GET', url, true);
    request.send();
}



document.getElementById("current").innerHTML= ` <li class="clearfix">
<img class="bookimg" src="./plumb.jpg" alt="item" />
<span class="item-name">House plumbing</span>
<span class="item-price">$20</span>
<br>

<span class="item-quantity">Time: 12 pm</span>
</li>
<hr>`;
