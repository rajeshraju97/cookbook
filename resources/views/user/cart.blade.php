@extends('layouts.app')
@section('title', 'Cart')
@section('content')
@include('layouts.nav')
<!-- Include FontAwesome for the icons -->


<style>
    /* Styles for the Cart Page */
    /* From Uiverse.io by mi-series */
    /* Body */

    hr {
        height: 1px;
        background-color: #E5C7C5;
        border: none;
    }

    .card {
        width: 100%;
        background: #FF7D29;
        box-shadow: rgba(0, 0, 0, 0.2) 0px 12px 28px 0px, rgba(0, 0, 0, 0.1) 0px 2px 4px 0px, rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset;
        border-radius: 19px 19px 0px 0px;
    }

    .title {
        width: 100%;
        height: 40px;
        position: relative;
        display: flex;
        align-items: center;
        padding-left: 20px;
        border-bottom: 1px solid #E5C7C5;
        font-weight: 700;
        font-size: 20px;
        color: white;
        font-family: "Montserrat", san-serif;
    }

    /* Cart */


    .cart .steps {

        padding: 20px;

    }

    .cart .steps .step {
        gap: 10px;
    }

    .cart .steps .step span {
        font-size: 18px;
        font-weight: 600;
        color: white;
        margin-bottom: 8px;
        display: block;
        font-family: "Montserrat", san-serif;
    }

    .cart .steps .step p {
        font-size: 15px;
        font-weight: 600;
        color: white;
        font-family: "Montserrat", san-serif;
        margin-top: 0px;
    }




    .shipping .form button {
        padding: 10px 18px;
        gap: 10px;
        width: 75%;
        height: 41px;
        left: -24px;
    }

    /* Promo */
    .promo form {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .input_field {
        width: 73%;
        height: 36px;
        padding: 0 0 0 12px;
        border-radius: 5px;
        outline: none;
        border: 1px solid #E5C7C5;
        transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
    }

    .input_field:focus {
        border: 1px solid transparent;
        box-shadow: 0px 0px 0px 2px #F3D2C9;

    }

    .promo form button {
        height: 36px;
        border-radius: 5px;
        border: 0;
        font-style: normal;
        font-weight: 600;
        font-size: 12px;
        line-height: 15px;
        padding: 10px 18px;
    }

    /* Checkout */
    .payments .details {
        display: grid;
        grid-template-columns: 8fr 1fr;
        gap: 5px;
        word-wrap: break-word;
    }

    .payments .details span {
        font-size: 13px;
        font-weight: 600;
        color: white;
    }

    .checkout .footer {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        padding: 10px 10px 10px 20px;
        background-color: #FF7D29;
    }

    .price {
        font-size: 18px;
        color: white;
        font-weight: 900;
        margin-bottom: 10px;
    }

    .checkout .checkout-btn {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        width: 150px;
        height: 36px;
        border-radius: 7px;
        border: 1px solid #ECC2C0;
        color: #000000;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
    }

    /* css for the button */
    .button-30 {
        align-items: center;
        appearance: none;
        background-color: #FCFCFD;
        border-radius: 4px;
        border-width: 0;
        box-shadow: rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
        box-sizing: border-box;
        color: #36395A;
        cursor: pointer;
        display: inline-flex;
        font-family: "JetBrains Mono", monospace;
        height: 48px;
        justify-content: center;
        line-height: 1;
        list-style: none;
        overflow: hidden;
        padding-left: 16px;
        padding-right: 16px;
        position: relative;
        text-align: left;
        text-decoration: none;
        transition: box-shadow .15s, transform .15s;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        white-space: nowrap;
        will-change: box-shadow, transform;
        font-size: 18px;
    }

    .button-30:focus {
        box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
    }

    .button-30:hover {
        box-shadow: rgba(45, 35, 66, 0.4) 0 4px 8px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
        transform: translateY(-2px);
    }

    .button-30:active {
        box-shadow: #D6D6E7 0 3px 7px inset;
        transform: translateY(2px);
    }
</style>

<style>
    /* modal desings */
    .modal-content {
        border-radius: 12px;
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
        background-color: #fff;
        padding: 20px;
    }

    .modal-header {
        padding-bottom: 10px;
        border-bottom: none;
    }

    .modal-header .btn-close {
        background: transparent;
        border: none;
        font-size: 1.2rem;
    }

    .modal-body {
        padding: 20px 15px;
    }

    .form-group label {
        font-weight: 600;
        color: #333;
    }

    .form-control {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 10px;
        font-size: 14px;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.2);
    }

    .address-label .form-check-input {
        display: none;
    }

    .address-label .form-check-label {
        display: inline-block;
        padding: 8px 16px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .address-label .form-check-label:hover {
        background-color: #f8f9fa;
    }

    .address-label .form-check-input:checked+.form-check-label {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        padding: 10px 20px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>



<div class="container-fluid">
    <!-- Left Panel: Dishes and Total -->
    <div class="row">
        <div class="left-panel col-12 col-lg-8">
            <h2 style="margin-bottom: 1rem; font-size: 1.5rem; font-weight: bold;">Your Dishes</h2>
            @forelse ($cartItems as $item)
                <div
                    style="display: flex; gap: 1rem; margin-bottom: 1rem; padding: 1rem; background: #fff; border: 1px solid #ddd; border-radius: 8px; align-items: center;">
                    <img src="{{ asset('dishes_images/' . $item->dishes->dish_image) }}"
                        alt="{{ $item->dishes->dish_name }}"
                        style="width: 80px; height: 80px; border-radius: 8px; object-fit: cover;">
                    <div style="flex-grow: 1;">
                        <h3 style="margin: 0; font-size: 1.2rem;">{{ $item->dishes->dish_name }}</h3>
                    </div>
                    <!-- Delete Button -->
                    <form action="{{ route('user.cart.destroy', $item->id) }}" method="POST" style="margin: 0;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            style="background: #e74c3c; color: white; border: none; padding: 0.5rem 1rem; border-radius: 8px; cursor: pointer;">
                            <i class="fas fa-times"></i>
                        </button>
                    </form>
                </div>
            @empty
                <p>No items in your cart!</p>
            @endforelse
        </div>


        <!-- Right Panel: Total Amount -->
        @if ($cartItems->isNotEmpty())
            <div class="right-panel col-12 col-lg-4">

                <div class="card-body">
                    <!-- Modal -->
                    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title">
                                        <span class="fw-bold">Add Address</span>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('user.address.add')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label class="mb-2">Address Label</label>
                                                    <div class="d-flex gap-2 flex-wrap">
                                                        <!-- Modern Styled Radio Buttons -->
                                                        <div class="form-check form-check-inline address-label">
                                                            <input type="radio" id="home" name="label" value="Home"
                                                                class="form-check-input">
                                                            <label class="form-check-label" for="home">
                                                                <i class="fas fa-home me-2"></i> Home
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline address-label">
                                                            <input type="radio" id="work" name="label" value="Work"
                                                                class="form-check-input">
                                                            <label class="form-check-label" for="work">
                                                                <i class="fas fa-briefcase me-2"></i> Work
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline address-label">
                                                            <input type="radio" id="office" name="label" value="Office"
                                                                class="form-check-input">
                                                            <label class="form-check-label" for="office">
                                                                <i class="fas fa-building me-2"></i> Office
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline address-label">
                                                            <input type="radio" id="other" name="label" value="Other"
                                                                class="form-check-input">
                                                            <label class="form-check-label" for="other">
                                                                <i class="fas fa-ellipsis-h me-2"></i> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Address Line 1</label>
                                                    <input name="address_line_1" type="text" class="form-control"
                                                        placeholder="Enter Address Line 1">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Address Line 2</label>
                                                    <input name="address_line_2" type="text" class="form-control"
                                                        placeholder="Enter Address Line 2">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>City</label>
                                                    <input name="city" type="text" class="form-control"
                                                        placeholder="Enter City">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Pincode</label>
                                                    <input name="pincode" type="number" class="form-control"
                                                        placeholder="Enter Pincode">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer border-0">
                                            <button type="submit" class="btn btn-primary w-100 py-2">
                                                Add Address
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card cart">
                    <label class="title">CHECKOUT</label>
                    <div class="steps">
                        <div class="step">
                            <div class="shipping">
                                <span>Delivery Address</span>
                                <div class="form">

                                    @if ($addresses->isNotEmpty())
                                        <ul>
                                            @foreach ($addresses as $address)
                                                <li style="margin-bottom: 1rem;padding: 1rem; border-radius: 8px;">
                                                    <strong>{{ $address->label }}</strong>
                                                    <p>{{ $address->address_line_1 }},{{ $address->address_line_2 }},{{ $address->city }},
                                                        {{ $address->pincode }}
                                                    </p>

                                                    <button class="button-30" role="button"
                                                        onclick="selectAddress('{{ $address->id }}')">Set as
                                                        Default</button>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-danger">No saved addresses!</p>
                                        <!-- <button class="button-30" role="button">Add Address</button> -->
                                        <button class="button-30" role="button" data-bs-toggle="modal"
                                            data-bs-target="#addRowModal">Add Address</button>
                                    @endif
                                </div>
                            </div>
                            <div class="promo">
                                <span>HAVE A PROMO CODE?</span>
                                <form class="form">
                                    <input class="input_field" placeholder="Enter a Promo Code" type="text">
                                    <button class="button-30" role="button">Apply</button>
                                </form>
                            </div>
                            <hr>
                            <div class="payments">
                                <span>PAYMENT</span>
                                <div class="details">
                                    <span>Subtotal:</span>
                                    <span id="total-amount">₹{{ number_format($cartItems->sum('total_amount'), 2) }}</span>
                                    <span>Shipping:</span>
                                    <span>₹50.00</span>
                                    <span>Tax:</span>
                                    <span>₹30.40</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card checkout mt-2">
                    <div class="footer">
                        <form action="{{ route('user.checkout') }}" method="POST">
                            @csrf
                            <input type="hidden" name="order_ids" value="{{ $cartItems->pluck('id')->join(',') }}">
                            <input type="hidden" name="total_amount"
                                value="{{  number_format($cartItems->sum('total_amount') + 50 + 30.40, 2) }}">

                            <div style="margin-bottom: 1rem;">
                                <h4>Select Payment Method</h4>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="payment_method" id="cod" value="COD"
                                        required>
                                    <label class="form-check-label" for="cod">
                                        <i class="fas fa-money-bill-wave me-2"></i> <span class="text-light">Cash on
                                            Delivery</span>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="payment_method" id="razorpay"
                                        value="Online" required>
                                    <label class="form-check-label" for="razorpay">
                                        <i class="fas fa-credit-card me-2"></i><span class="text-light">Pay Online
                                            (Razorpay)</span>
                                    </label>
                                </div>
                            </div>

                            <label class="price" style="margin-right: 12pc;">
                                Total: ₹{{ number_format($cartItems->sum('total_amount') + 50 + 30.40, 2) }}
                            </label>

                            <button type="submit" class="button-30" role="button">Checkout</button>

                        </form>

                    </div>
                </div>


            </div>

        @endif

    </div>


</div>



<script>




    // Define selectAddress in the global scope

    function selectAddress(addressId) {
        console.log('Button clicked. Address ID:', addressId);

        const url = `{{ url('user/address/select') }}`;

        // Perform a POST request
        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ address_id: addressId }), // Send address_id in the request body
        })
            .then(async (response) => {
                if (!response.ok) {
                    const errorText = await response.text();
                    throw new Error(`Failed to set default address. Server responded with: ${errorText}`);
                }
                return response.json();
            })
            .then((data) => {
                // Display success message and reload the page
                alert(data.message || 'Address set as default!');
                location.reload();
            })
            .catch((error) => {
                console.error('Error:', error.message);
                alert('Unable to set default address. Please try again.');
            });
    }

    // Additional modal logic
    $(document).ready(function () {
        $("#addRowButton").click(function () {
            $("#addRowModal").modal("hide");
        });
    });


</script>







@endsection