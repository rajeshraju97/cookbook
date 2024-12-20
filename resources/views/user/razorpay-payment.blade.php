<!DOCTYPE html>
<html lang="en">

<head>
    <title>Razorpay Payment</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>

<body>
    <h3>Total Amount: ₹{{ $amount }}</h3>

    <script>
        const options = {
            key: "{{ $key }}",
            amount: "{{ $amount * 100 }}",
            currency: "{{ $currency }}",
            order_id: "{{ $razorpayOrderId }}",
            handler: function (response) {
                alert("Payment Successful!");
                window.location.href = "user/order-confirmation";
            },
            modal: {
                ondismiss: function () {
                    alert("Payment cancelled.");
                },
            },
        };
        const rzp = new Razorpay(options);
        rzp.open();
    </script>
</body>

</html>