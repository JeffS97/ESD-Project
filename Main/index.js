
    var name=document.getElementById('name').value
    var date=document.getElementById('date').value
    var time=document.getElementById('time').value



paypal.Buttons({
    style : {
        color: 'blue',
        shape: 'pill'
    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units : [{
                amount: {
                    value: '50'
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            alert('Payment Successful')
            window.location.href = "../Main/confirm.php?name=" + clinic_name + "&time=" + time + "&date=" + date;
        })
    },
    onCancel: function (data) {
        alert('Payment Cancelled')
    }
}).render('#paypal-payment-button');