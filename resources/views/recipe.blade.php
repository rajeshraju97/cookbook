@extends('layouts.app')
@section('title', 'Recipe')
@section('content')
@include('layouts.nav')

<style>
    /* General Styles for Ingredients Form */
    /* General Styles for Ingredients Form */
    #ingredientsForm {
        padding: 20px;
        border-radius: 8px;
        background: #f9f9f9;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    /* Ingredients List */
    .ingredients-list {
        margin: 0 -15px;
        /* Adjust spacing for Bootstrap row */
    }

    /* Ingredient Row */
    .ingredient-row {
        padding: 10px;
        background: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 6px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 14px;
        transition: background 0.3s ease;
    }

    .ingredient-row:hover {
        background: #f4f4f4;
    }

    /* Checkbox Styles */
    .uk-checkbox {
        width: 16px;
        height: 16px;
    }

    /* Ingredient Label */
    .ingredient-label {
        flex: 1;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Counter Styles */
    .ingredient-counter {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .counter-btn {
        width: 32px;
        height: 32px;
        border: none;
        border-radius: 50%;
        font-size: 18px;
        color: white;
        background-color: #88C273;
        cursor: pointer;
    }

    .counter-btn:hover {
        background-color: #eb4a36;
    }

    .counter-display {
        width: 70px;
        text-align: center;
        border: 1px solid #ced4da;
        border-radius: 4px;
        padding: 4px;
        font-size: 14px;
        background: #ffffff;
    }

    /* Select All and Place Order Button */
    .uk-flex {
        margin-top: 20px;
    }

    #uk-button {

        font-size: 18px;
        font-weight: bold;
    }
</style>

<div class="uk-container">
    @if(session('status') == 'success')
        <script>
            Toastify({
                text: "{{ session('message') }}",
                duration: 3000, // Duration in milliseconds
                gravity: "top", // `top` or `bottom`
                position: 'right', // `left`, `center` or `right`
                backgroundColor: "#88C273", // Customize background color
            }).showToast();
        </script>
    @endif
    <div data-uk-grid>
        <div class="uk-width-1-2@s">
            <div><img class="uk-border-rounded-large" src="{{asset('single_recipe/chickenbiryani.png')}}"
                    alt="Image alt"></div>
        </div>
        <div class="uk-width-expand@s uk-flex uk-flex-middle">
            <div>
                <h1>Chicken Biryani</h1>
                <p>Supermarket brands of ricotta contain stabilizers, which can give the cheese a gummy texture when
                    baked. Check the label and choose ricotta made with as few ingredients as possible.</p>
                <div class="uk-margin-medium-top uk-child-width-expand uk-text-center uk-grid-divider" data-uk-grid>
                    <div>
                        <!-- <span data-uk-icon="icon: clock; ratio: 1.6"></span> -->
                        <h5 class="uk-text-500 uk-margin-small-top uk-margin-remove-bottom">No of members</h5>
                        <form class="uk-form">
                            <select class="uk-select" id="noOfMembers">
                                <option value="" disabled selected>Select members</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <!-- Add more options as needed -->
                            </select>
                        </form>
                    </div>
                </div>

                <hr>
            </div>
        </div>
    </div>
</div>



<div id="ingredientsForm" class="uk-margin-medium-top" style="display:none;">
    <h4>Ingredients for <span id="memberCount"></span> members</h4>
    <form id="orderForm" method="POST" action="{{ route('user.order.ingredients') }}">
        @csrf
        <input type="hidden" name="dish_id" value="101">
        <input type="hidden" name="dish_name" value="Chicken Biryani">

        <div class="row">
            <!-- Ingredients Section on the Left -->
            <div class="col-lg-8">
                <div class="row ingredients-list">
                    <!-- Dynamic Ingredients Will Be Injected Here -->
                </div>

            </div>

            <!-- Order Section on the Right -->
            <div class="col-lg-4 d-flex flex-column justify-content-start align-items-start">
                <!-- Select All Checkbox -->
                <div class="form-check mb-4">
                    <label>
                        <input type="checkbox" id="selectAll" class="uk-checkbox" checked> Select All
                    </label>
                </div>

                <!-- Amount Section -->
                <div class="total-amount-card mb-3" style="
    width: 59%; 
    background: linear-gradient(135deg, #4caf50, #81c784); 
    border-radius: 8px; 
    padding: 1rem; 
    display: flex; 
    align-items: center; 
    gap: 2.5rem; 
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    <span style="font-size: 1rem; color: #fff; font-weight: bold;">Total Amount</span>
                    <div style="display: flex; align-items: center; gap: 0.2rem;">
                        <span style="font-size: 1.5rem; color: #fff; font-weight: bold;">₹</span>
                        <span id="totalAmount" style="color: #fff; font-size: 1.5rem; font-weight: bold;">490.00</span>
                    </div>
                </div>


                <!-- Place Order Button -->
                <button type="submit" class="uk-button uk-button-primary uk-button-large" id="uk-button">
                    <span uk-icon="icon: cart; ratio: 1.2"></span> Place Order
                </button>
            </div>

        </div>
    </form>
</div>


<script>
    // Function to update the total price dynamically
    function updateTotalPrice() {
        let totalPrice = 0;

        // Loop through all ingredient rows
        const ingredientRows = document.querySelectorAll('.ingredient-row');
        ingredientRows.forEach(row => {
            const checkbox = row.querySelector('input[type="checkbox"]');
            if (checkbox.checked) {
                const quantityInput = row.querySelector('.counter-display');
                const pricePerUnit = parseFloat(checkbox.dataset.price);
                const type = checkbox.dataset.type; // Fixed or variable
                let quantity = parseFloat(quantityInput.value.split(' ')[0]) || 0;

                // If the ingredient is fixed, consider it as 1 unit always
                if (type === 'fixed') {
                    quantity = 1;
                }

                totalPrice += pricePerUnit * quantity;
            }
        });

        // Update the total price display
        // Update the total price display
        const totalAmountSpan = document.getElementById('totalAmount');
        totalAmountSpan.textContent = totalPrice.toFixed(2);

    }

    // Function to update the ingredient quantity and recalculate the total price
    function updateQuantity(index, change) {
        const input = document.querySelector(`input[name="ingredients[${index}][quantity]"]`);
        let [currentValue, unit] = input.value.split(/(\s+)/); // Split value and unit
        currentValue = parseFloat(currentValue) || 0;

        if (change < 0 && currentValue <= 0) return; // Prevent negatives

        currentValue = Math.max(currentValue + change, 0).toFixed(1); // Update value

        // Check if unit exists; if not, default to an empty string
        unit = unit ? unit.trim() : '';

        input.value = `${currentValue}${unit ? ' ' + unit : ''}`; // Preserve unit if available

        updateTotalPrice(); // Recalculate total price
    }


    // Fetching ingredients dynamically when members are selected
    document.getElementById('noOfMembers').addEventListener('change', function () {
        const members = this.value;
        const dishId = 101;

        document.getElementById('memberCount').textContent = members;

        const url = `{{ url('user/get-ingredients') }}/${dishId}/${members}`;

        fetch(url, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
        })
            .then(response => response.json())
            .then(data => {
                const ingredientsList = document.querySelector('#ingredientsForm .ingredients-list');
                ingredientsList.innerHTML = ''; // Clear previous content

                data.ingredients.forEach((ingredient, index) => {
                    const { name, scaled_quantity, unit, scaled_price, type } = ingredient;
                    const listItem = `
                        <div class="col-md-6 mb-3">
                            <div class="ingredient-row">
                                <label class="ingredient-label">
                                    <input 
                                        type="checkbox" 
                                        name="ingredients[${index}][selected]" 
                                        value="1" 
                                        class="uk-checkbox" 
                                        data-price="${scaled_price}" 
                                        data-type="${type}" 
                                        checked 
                                        onchange="updateTotalPrice()"> 
                                    ${name} (${scaled_quantity}-${unit}) - Rs. ${scaled_price}
                                </label>
                                <div class="ingredient-counter">
                                    <button 
                                        type="button" 
                                        class="counter-btn decrement-btn" 
                                        onclick="updateQuantity(${index}, -1)">-</button>
                                    <input 
                                        type="text" 
                                        name="ingredients[${index}][quantity]" 
                                        value="${scaled_quantity}" 
                                        readonly 
                                        class="counter-display">
                                    <button 
                                        type="button" 
                                        class="counter-btn increment-btn" 
                                        onclick="updateQuantity(${index}, 1)">+</button>
                                </div>
                                <input type="hidden" name="ingredients[${index}][name]" value="${name}">
                            </div>
                        </div>
                    `;
                    ingredientsList.innerHTML += listItem;
                });

                // Show the form after data is loaded
                document.getElementById('ingredientsForm').style.display = 'block';

                // Add "Select All" functionality
                document.getElementById('selectAll').addEventListener('change', function () {
                    const checkboxes = document.querySelectorAll('.ingredients-list input[type="checkbox"]');
                    checkboxes.forEach(checkbox => checkbox.checked = this.checked);
                    updateTotalPrice(); // Update total price when selecting/deselecting all
                });

                updateTotalPrice(); // Initial calculation
            })
            .catch(error => {
                console.error('Error fetching ingredients:', error);
            });
    });
</script>








@endsection