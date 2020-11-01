

// function getPost(){
//     let url="../Main/getPost.php";
//     var request = new XMLHttpRequest();
//     request.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             var posts=JSON.parse(this.response);
//             console.log(posts);
//         }
//     }
//     request.open('GET', url, true);
//     request.send();
// }

document.getElementById('bookings').innerHTML=`<div class="col-12  col-md-6 col-lg-4 ">
<div class=" services card expand">
  <img class="card-img-top" src="./plumb.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <button class="button">View</button>
  </div>
</div>
</div>
`;

document.getElementById("current").innerHTML= ` <li class="clearfix">
<img class="bookimg" src="./plumb.jpg" alt="item" />
<span class="item-name">House plumbing</span>
<span class="item-price">$20</span>
<br>

<span class="item-quantity">Time: 12 pm</span>
</li>
<hr>`;
