
window.onload = userDetails();
window.onload=chart();
function userDetails(){
  var userDetails
    const request = new XMLHttpRequest();

    request.onreadystatechange = function(){
        if(this.readyState ==4 && this.status==200){
          userDetails  = JSON.parse(this.responseText) ;
        }

    request.open("GET","../Main/getUserDetails.php",true);
    request.send();

    console.log(userDetails);
}

}
function chart(){
  let url="../Main/getEarnings.php";
  var request = new XMLHttpRequest();
  request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var result=JSON.parse(this.response);
      var date=[];
      var earn=[];
      total=0;
      for(var node of result.earnings){
        date.push(node.gigEndDate);
        earn.push(node.gigPrice);
        total+=Number(node.gigPrice);
      }

      document.getElementById("total").innerHTML="Total Earnings: $"+total;
      var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
      labels: date,
      datasets: [{
          label: 'Earnings $',
          data: earn,
          backgroundColor: [
              'rgba(0,60,100,1)',
              'rgba(0,60,100,1)',
              'rgba(0,60,100,1)',
              'rgba(0,60,100,1)',
              'rgba(0,60,100,1)',
              'rgba(0,60,100,1)'
          ],
          strokeColor: "black",
          borderWidth: 1
      }]
  },
  
  
  options: {
      scales: {
          yAxes: [{
              ticks: {
                  beginAtZero:true
              }
              
          }]
      }
  }
});
}
  }
request.open('GET', url, true);
request.send();
}
// 
//  
//  
// 
//     
//         
//          var date=[];
      

//          console.log(result)
//          var barChartData = {
//             labels: ["dD 1", "dD 2", "dD 3", "dD 4", "dD 5", "dD 6", "dD 7", "dD 8", "dD 9", "dD 10"],
//             datasets: [{
//               fillColor: "rgba(0,60,100,1)",
//               strokeColor: "black",
//               data: []
//             }]
//           }
//      }}
//     
//   
  
  
  
//   var index = 10;
//   var ctx = document.getElementById("canvas").getContext("2d");
//   var barChartDemo = new Chart(ctx).Bar(barChartData, {
//     responsive: true,
//     barValueSpacing: 2
//   });
// }
  /* setInterval(function() {
    barChartDemo.removeData();
    barChartDemo.addData([dData()], "dD " + index);
    index++;
  }, 3000); */
