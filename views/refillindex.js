
$(async () => {
    var serviceURL = "http://localhost:8000/api/v1/complexprescription/getPrice";
	
        // let num = <?php echo $_SESSION['patient_id']?>;
        // var Patient_Id = num.toString();
        try {
            var patientId=document.getElementById('patientid').value;
            console.log(patientId)            
            const response =
                await fetch(
                    serviceURL, {
                        method: 'POST',
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            Patient_Id : patientId
                        })
                    }
                );
            const result = await response.json();
            if (response.status === 200) {
                // success case
                console.log(result)
                var price = result.payment; //the array is in books within data of 
                // the returned result
                // for loop to setup all table rows with obtained book data
               
                // add all the rows to the table

                document.getElementById('pay').value=price.Price
                document.getElementById('amount').innerHTML="$"+price.Price
                price=price.Price.toString()
console.log(price)
paypal.Buttons({
    style : {
        color: 'blue',
        shape: 'pill'
    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units : [{
                amount: {
                    value: price
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            console.log(details)
              alert("Payment Sucessful")
            

              window.location.replace('./patientMakesRefillRequest.php')
        })
    },
    onCancel: function (data) {
       alert("Payment Cancelled")
       window.location.replace('./main.php')
    }
}).render('#paypal-payment-button');
            } else if (response.status == 404) {
                // No Appointment
                // showError(result.message);
                console.log(response);
            } else {
                // unexpected outcome, throw the error
                throw response.status;
            }
        } catch (error) {
            // Errors when calling the service; such as network error, 
            // service offline, etc
            // showError('There is a problem retrieving price data, please try again later.<br/>' + error);
            console.log(error);
        } // error
    });







