@extends('layouts.app')
@section('title', 'Razorpay Payment')

@section('content')
@include('layouts.nav')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>


<h3>Total Amount: ₹{{ $amount / 10000}}</h3>

<script>
    const options = {
        key: "{{ $key }}",
        amount: "{{ $amount }}", // Amount in paise
        currency: "{{ $currency }}",
        order_id: "{{ $razorpayOrderId }}",
        prefill: {
            contact: "{{ $mobile }}", // User's mobile number
        },
        handler: function (response) {
            // Make an AJAX request to update order statuses
            fetch('/user/update-order-status', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    order_ids: "{{ implode(',', $orderIds) }}", // Pass the order IDs
                    payment_status: 'Online',
                }),
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.success) {
                        // Redirect to order-confirmation page
                        window.location.href = "user/order-confirmation";
                    } else {
                        alert("Failed to update order status. Please contact support.");
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                    alert("Something went wrong. Please try again.");
                });
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

@endsection