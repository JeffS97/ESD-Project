var price=document.getElementById('pay').value;
var patientId=document.getElementById('patientid').value;
price=price.toString()
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
              $(async () => {
                var serviceURL = "http://localhost:8000/api/v1/complexprescription/addPayment"
                
        
               
                    var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        
        today = mm + '/' + dd + '/' + yyyy;
                    const response =
                        await fetch(
                            serviceURL, {
                                method: 'POST',
                                headers: {
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    "Price" : price,
                                    'Date': today,
                                    "Patient_Id":patientId
        
                                })
                            }
                        );
                    const result = await response.json();
                    if (response.status === 200) {
                        console.log(result)
                       
                    } else if (response.status == 404) {
                        showError(result.message);
                    } else {
                        throw response.status;
                    }
             // error
                    });

              window.location.replace('./patientMakesRefillRequest.php')
        })
    },
    onCancel: function (data) {
       alert("Payment Cancelled")
       window.location.replace('./main.php')
    }
}).render('#paypal-payment-button');