
var price=document.getElementById('pay').value;
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
              window.location.replace('./patientMakesRefillRequest.php')
        })
    },
    onCancel: function (data) {
       alert("Payment Cancelled")
       window.location.replace('./main.php')
    }
}).render('#paypal-payment-button');