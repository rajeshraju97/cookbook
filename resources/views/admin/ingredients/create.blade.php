@extends('layouts.admin')
@section('title', 'Ingredients Create')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Ingredients</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Ingredients</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Create</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Ingredient</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.ingredients.store') }}" class="form-group">
                            @csrf


                            <!-- Dish Name -->
                            <div class="mb-3">
                                <label for="dishName" class="form-label">Dish</label>
                                <select class="form-select form-control" name="dish_id">
                                    <option value="">Select Dish</option>
                                    @foreach($dishes as $dish)
                                        <option value="{{$dish->id}}">{{$dish->dish_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Ingredients Section -->
                            <div id="ingredientsContainer" class="mb-3">
                                <h5>Dish Ingredients</h5>
                                <div class="ingredient-row border rounded p-3 mb-3">
                                    <div class="row g-2">
                                        <div class="col-md-3">
                                            <label for="ingredientName0" class="form-label">Ingredient Name</label>
                                            <input type="text" name="ingredients[0][name]" id="ingredientName0"
                                                class="form-control" placeholder="e.g., Rice" required>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="unit0" class="form-label">Unit</label>
                                            <input type="text" name="ingredients[0][unit]" id="unit0"
                                                class="form-control" placeholder="e.g., 1 kg or 300 g" required>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="quantity0" class="form-label">Quantity</label>
                                            <input type="number" name="ingredients[0][quantity]" id="quantity0"
                                                class="form-control" placeholder="e.g., 1" min="1" required>
                                        </div>



                                        <div class="col-md-2">
                                            <label for="price0" class="form-label">Price</label>
                                            <input type="number" name="ingredients[0][price]" id="price0"
                                                class="form-control" placeholder="e.g., 100" min="0" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="type0" class="form-label">Type</label>
                                            <select name="ingredients[0][type]" id="type0" class="form-select" required>
                                                <option value="" disabled selected>Select Type</option>
                                                <option value="variable">Variable</option>
                                                <option value="fixed">Fixed</option>
                                            </select>
                                        </div>
                                        <!-- <div class="col-md-1 d-flex align-items-end">
                                            <button type="button"
                                                class="btn btn-danger remove-ingredient-btn">Remove</button>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                            <!-- Add Ingredient Button -->
                            <button type="button" id="addIngredientBtn" class="btn btn-secondary mb-3">Add Another
                                Ingredient</button>

                            <!-- No of members -->
                            <div class="mb-3">
                                <label for="dishName" class="form-label">No Of Members</label>
                                <input type="number" name="no_of_members" id="dishName" class="form-control"
                                    placeholder="e.g., 10" required>
                            </div>


                            <!-- Submit Button -->
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Save Ingredients</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        let ingredientCount = 1;

        // Add another ingredient row
        document.getElementById('addIngredientBtn').addEventListener('click', () => {
            const container = document.getElementById('ingredientsContainer');
            const newRow = `
    <div class="ingredient-row border rounded p-3 mb-3">
        <div class="row g-2">
            <div class="col-md-3">
                <label for="ingredientName${ingredientCount}" class="form-label">Ingredient Name</label>
                <input type="text" name="ingredients[${ingredientCount}][name]" id="ingredientName${ingredientCount}" class="form-control" placeholder="e.g., Rice" required>
            </div>

             <div class="col-md-2">
                <label for="unit${ingredientCount}" class="form-label">Unit</label>
                <input type="text" name="ingredients[${ingredientCount}][unit]" id="unit${ingredientCount}" class="form-control" placeholder="e.g., 1 kg or 300 g" required>
            </div>

             <div class="col-md-2">
                <label for="quantity${ingredientCount}" class="form-label">Quantity</label>
                <input type="number" name="ingredients[${ingredientCount}][quantity]" id="quantity${ingredientCount}" class="form-control" placeholder="e.g., 1" min="1" required>
            </div>
           
           
            <div class="col-md-2">
                <label for="price${ingredientCount}" class="form-label">Price</label>
                <input type="number" name="ingredients[${ingredientCount}][price]" id="price${ingredientCount}" class="form-control" placeholder="e.g., 100" min="0" required>
            </div>
            <div class="col-md-2">
                <label for="type${ingredientCount}" class="form-label">Type</label>
                <select name="ingredients[${ingredientCount}][type]" id="type${ingredientCount}" class="form-select" required>
                    <option value="" disabled selected>Select Type</option>
                    <option value="variable">Variable</option>
                    <option value="fixed">Fixed</option>
                </select>
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-ingredient-btn">Remove</button>
            </div>
        </div>
    </div>
`;

            container.insertAdjacentHTML('beforeend', newRow);
            ingredientCount++;
        });

        // Remove ingredient row
        document.getElementById('ingredientsContainer').addEventListener('click', (e) => {
            if (e.target.classList.contains('remove-ingredient-btn')) {
                e.target.closest('.ingredient-row').remove();
            }
        });
    });
</script>

@endsection