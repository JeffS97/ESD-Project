<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .checked {
            color: orange;
            }
            .graph{
              width: 50%;
              margin-left: 40%;
              margin-top: 5%;

            }
    </style>
</head>

<body>

    <div class = "container">


        <div class = "row">

            <div class = "col-lg-4 my-3">
                <div class="card card-fluid">
                    <h6 class="card-header"> Your Details </h6>
                    <nav class="nav flex-column nav-tabs">
                      <a href="Profile.html" class="nav-link active">Profile</a>
                      <a href="Account.html" class="nav-link">Account</a>
                      <a href="History.html" class="nav-link">History</a>
                    </nav>
                  </div>
            </div>

            <div class="col-lg-8 my-3">
                <div class="card card-fluid">
                  <h6 class="card-header"> Public Profile </h6>
                  <div class="card-body">

                    
                  </div>
                </div>


        </div>

    </div>
    <div class="graph">
      <canvas id="canvas"></canvas>
    </div>


<script src="profile.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js" crossorigin="anonymous"></script>
</body>
<script>
  var dData = function() {
  return Math.round(Math.random() * 90) + 10
};

var barChartData = {
  labels: ["dD 1", "dD 2", "dD 3", "dD 4", "dD 5", "dD 6", "dD 7", "dD 8", "dD 9", "dD 10"],
  datasets: [{
    fillColor: "rgba(0,60,100,1)",
    strokeColor: "black",
    data: [dData(), dData(), dData(), dData(), dData(), dData(), dData(), dData(), dData(), dData()]
  }]
}

var index = 10;
var ctx = document.getElementById("canvas").getContext("2d");
var barChartDemo = new Chart(ctx).Bar(barChartData, {
  responsive: true,
  barValueSpacing: 2
});
/* setInterval(function() {
  barChartDemo.removeData();
  barChartDemo.addData([dData()], "dD " + index);
  index++;
}, 3000); */
</script>
</html>